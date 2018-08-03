#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <unistd.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>

#define port 4444

int main(int argc, char const *argv[])
{
    int clientsocket;
    struct sockaddr_in server_address;
    char message[1024], Reply[200];

    clientsocket = socket(AF_INET, SOCK_STREAM, 0);

    //check connection
    if(clientsocket < 0){
        printf("Socket creation failed.\n");
        exit(1);
    }
    //using the socket server address
    //soocket family
    server_address.sin_family = AF_INET;
    //socket type
    server_address.sin_addr.s_addr = inet_addr("127.0.0.1");
    //socket port
    server_address.sin_port = htons(port);

    //Initializing connection to the server
    int connection_status = connect(clientsocket, (struct sockaddr *)&server_address,sizeof(server_address));
    if(connection_status < 0){
        printf("Server is busy\n");
        exit(1);
    }
    printf("Connected to the User 2\n");
    printf("\nEnter your command and String Or\nEnter \':reply\' to get Feedback\n\':exit\' to close connection\n");
    //infinite loop for the client so that the client is able to enter input at any momen
    while(1){

        printf("\nClient: ");
        gets(message);
            send(clientsocket, message, 1024, 0);

            //if the input by the client is exit, then disconnect from the server
            if(strcmp(message, ":exit")==0){
                printf("Disconnected from the server\n");
                exit(1);
            }else{

            printf("Command Sent");
            recv(clientsocket, Reply, 1024, 0);
             printf("\n\nServer's reply: %s\n", Reply);
            }
    }
    return 0;
}