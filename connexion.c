#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <sys/time.h>
#include "libpq-fe.h"

static void exit_nicely(PGconn *conn){
PQfinish(conn);
exit(1);
}

int main(int argc, char **argv){
const char *conninfo;
PGconn     *conn;
PGresult   *res;
PGnotify   *notify;
int         nnotifies;

if (argc > 1)
conninfo = argv[1];
else
conninfo = "dbname = postgres";

/* se connecter a la base de données*/
conn = PQconnectdb("host='10.40.128.23' dbname='db2018l3i_aalili' user='y2018l3i_aalili' password='A123456*'");

/* s'assurer que la connection s'est bien établi */
if (PQstatus(conn) != CONNECTION_OK){
fprintf(stderr, "Connection to database failed: %s", PQerrorMessage(conn));
exit_nicely(conn);
}

/*
* Issue LISTEN command to enable notifications from the rule's NOTIFY.
*/
res = PQexec(conn, "LISTEN TBL2");
if (PQresultStatus(res) != PGRES_COMMAND_OK){
fprintf(stderr, "LISTEN command failed: %s", PQerrorMessage(conn));
PQclear(res);
exit_nicely(conn);
}

/*
* should PQclear PGresult whenever it is no longer needed to avoid memory
* leaks
*/
PQclear(res);

/* Quit after four notifies are received. */
nnotifies = 0;
while (nnotifies < 4){
/*
* Sleep until something happens on the connection.  We use select(2)
* to wait for input, but you could also use poll() or similar
* facilities.
*/
int         sock;
fd_set      input_mask;
sock = PQsocket(conn);

if (sock < 0)
break;              /* shouldn't happen */

FD_ZERO(&input_mask);
FD_SET(sock, &input_mask);

if (select(sock + 1, &input_mask, NULL, NULL, NULL) < 0)
{
fprintf(stderr, "select() failed: %s\n", strerror(errno));
exit_nicely(conn);
}

/* Now check for input */
PQconsumeInput(conn);
while ((notify = PQnotifies(conn)) != NULL)
{
fprintf(stderr,"ASYNC NOTIFY of '%s' received from backend pid %d\n",notify->relname, notify->be_pid);
PQfreemem(notify);
nnotifies++;
}
}

fprintf(stderr, "Done.\n");

/* close the connection to the database and cleanup */
PQfinish(conn);

return 0;
}

// affichage des informations de connexion:

void connexion_info(PGconn*connect)
{	
	printf("Database: %s\n", PQdb(connect));
	printf("User: %s\n", PQuser(connect));
    printf("Password: %s\n", PQpass(connect));
    printf("Host: %s\n",PQhost(connect));
    printf("Port: %s\n",PQport(connect));
}

// fermer la connexion proprement en cas d'erreur:

void do_exit(PGconn *connect,PGresult *result)
{
    fprintf(stderr,"%s\n",PQerrorMessage(connect));    
    PQclear(result);
    PQfinish(connect);    
    exit(1);
}

// concaténer 2 chaines de caractères:

char* concat_string(char*str1,char*str2)
{
	int n = strlen(str1)+strlen(str2)+1;
	char* result =(char*)malloc(n*sizeof(char));
	if(result){
		strcpy(result,str1);
		strcat(result,str2);
	}else{
		printf("malloc error!\n");
		exit(1);
	}
	return result;
}

// extraire le résultat d'une requête SQL de type SELECT, sous forme d'une chaîne de caractères formatée

char* extract_ntuples(PGconn*connect,char*select_query)
{
	if (PQstatus(connect) != CONNECTION_OK) do_exit(connect,NULL);

	PGresult *result = PQexec(connect,select_query);
	if (PQresultStatus(result) != PGRES_TUPLES_OK) do_exit(connect,result);

    char*ntuples_str=" ";
    for (int i = 0; i < PQntuples(result); i++){
        for (int j = 0; j < PQnfields(result); j++){
        	ntuples_str=concat_string(ntuples_str,PQgetvalue(result,i,j));
        }
       	strcat(ntuples_str," ;\n");
    }
    return ntuples_str;
}

// vérifier la réussite ou l'échec d'une requete DML en retournant une valeur entière de type SUCCESS / FAILURE:

int check_result_DML(PGconn*connect,char*dml_query)
{
	if (PQstatus(connect) != CONNECTION_OK) do_exit(connect,NULL);
	PGresult *result = PQexec(connect,dml_query);

	if(PQresultStatus(result) == PGRES_COMMAND_OK) return 0;
	else return 1;
}

// programme principal:

int main(){
    
    PGconn *connect = PQconnectdb("user=y2018l3i_aalili password=A123456* dbname=db2018l3i_aalili");
    if (PQstatus(connect) != CONNECTION_OK) do_exit(connect,NULL);
    if(!check_result_DML(connect,query)) do_exit(connect,result);

    PQfinish(connect);
    return 0;
}