#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <unistd.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>

#define port 4444



char *FirstCharacter(char *line);
char *LastCharacter(char *line);
char *concat(const char *s1,const char *s2);
char *FirstWord(char *line);
char *LastWord(char *line);

char** Split(const char *str, char delimiter);
int main(int argc, char const *argv[]){
	int serversocket;
	struct sockaddr_in server_address;

	char message[1024],commands[20][50] = {
										"double",
										"rev",
										"replace",
										"encrypt",
										"decrypt",
										"delete"
									};
	int newsocket;
	pid_t childpid;
	struct sockaddr_in newaddress;
	socklen_t addr_size;  

	serversocket = socket(AF_INET, SOCK_STREAM, 0);
	if(serversocket<0){
		printf("Socket failed to be created");
		exit(1);

	}
	printf("Socket Created\n");
    //using the socket server address
    //soocket family
    server_address.sin_family = AF_INET;
    //socket type
    server_address.sin_addr.s_addr = inet_addr("127.0.0.1");
    //socket port
    server_address.sin_port = htons(port);

    //in client we have to connect to the server. But with the server, we have to bind the Ip address to that specific port
    int binding = bind(serversocket, (struct sockaddr *)&server_address,sizeof(server_address));
    if(binding<0){
    	printf("Server has failed to bind the Ip address to the port\n");
    	exit(1);
    }
    printf("Bind to port successful\n");

    //Define the number of clients to be connected to that server at a time
    if(listen(serversocket, 10)==0){
    	printf("Listening.......\n");
    }else{
    	printf("Error in listenning\n");
    }

    //create an infinite loop
    while(1){
    	newsocket = accept(serversocket, (struct sockaddr*)&newaddress, &addr_size);
		if(newsocket<0){
			exit(1);
		}
		printf("Connection Accepted From: %s :%d\n",inet_ntoa(newaddress.sin_addr), ntohs(newaddress.sin_port));
		if((childpid=fork())==0){
			close(serversocket);

			while(1){
				recv(newsocket, &message, 1024, 0);
				
				if(strcmp(message, ":exit")==0){
					printf("\nDisconnected from: %s :%d\n",inet_ntoa(newaddress.sin_addr), ntohs(newaddress.sin_port));
					exit(1);
				}
				printf("Client Sent: %s\n", message);
							//last word in the string
				char *last = LastWord(message);
				//first word in the string
				char *first = FirstWord(message);
				
				if(first && last){
					int i,j,temp,len = strlen(last);
					//check if the first string is within the array commands
					if(strcmp(first, commands[0])==0){
						char *concatenated = concat(last, last);
						send(newsocket, concatenated, 1024, 0);
						printf("String doubled\n");
					}else if(strcmp(first, commands[1])==0){
						for(i=0, j=len-1; i < j; i++, j--){
							temp = last[i];
							last[i] = last[j];
							last[j] = temp;
						}	
						// send reversed string				
						send(newsocket, last, 1024, 0);
						printf("String reversed\n");
					}else if(strcmp(first, commands[3])==0){


						int a, aa;
    char validvs[54][18], finalstr[1000], alphabets[]={' ','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'};

strcpy(validvs[0],"?");
strcpy(validvs[1],"A");
strcpy(validvs[2],"B");
strcpy(validvs[3],"C");
strcpy(validvs[4],"D");
strcpy(validvs[5],"E");
strcpy(validvs[6],"F");
strcpy(validvs[7],"G");
strcpy(validvs[8],"H");
strcpy(validvs[9],"I");
strcpy(validvs[10],"1iA0");
strcpy(validvs[11],"1jB1");
strcpy(validvs[12],"1kC2");
strcpy(validvs[13],"1lD3");
strcpy(validvs[14],"1mE4");
strcpy(validvs[15],"1nF5");
strcpy(validvs[16],"1oG6");
strcpy(validvs[17],"1pH7");
strcpy(validvs[18],"1qI8");
strcpy(validvs[19],"1r1Ai09");
strcpy(validvs[20],"2s1Bj10");
strcpy(validvs[21],"2t1Ck21");
strcpy(validvs[22],"2u1Dl32");
strcpy(validvs[23],"2v1Em43");
strcpy(validvs[24],"2w1Fn54");
strcpy(validvs[25],"2x1Go65");
strcpy(validvs[26],"2y1Hp76");
strcpy(validvs[27],"2z1Iq87");
strcpy(validvs[28],"2a1r1Ai098");
strcpy(validvs[29],"2b2s1Bj109");
strcpy(validvs[30],"3c2t1Ck210");
strcpy(validvs[31],"3d2u1Dl321");
strcpy(validvs[32],"3e2v1Em432");
strcpy(validvs[33],"3f2w1Fn543");
strcpy(validvs[34],"3g2x1Go654");
strcpy(validvs[35],"3h2y1Hp765");
strcpy(validvs[36],"3i2z1Iq876");
strcpy(validvs[37],"3j2a1rA1i0987");
strcpy(validvs[38],"3k2b2sB1j1098");
strcpy(validvs[39],"3l3c2tC1k2109");
strcpy(validvs[40],"4m3d2uD1l3210");
strcpy(validvs[41],"4n3e2vE1m4321");
strcpy(validvs[42],"4o3f2wF1n5432");
strcpy(validvs[43],"4p3g2xG1o6543");
strcpy(validvs[44],"4q3h2yH1p7654");
strcpy(validvs[45],"4r3i2zI1q8765");
strcpy(validvs[46],"4s3j2a1rA1i09876");
strcpy(validvs[47],"4t3k2b2sB1j10987");
strcpy(validvs[48],"4u3l3c2tC1k21098");
strcpy(validvs[49],"4v4m3d2uD1l32109");
strcpy(validvs[50],"5w4n3e2vE1m43210");
strcpy(validvs[51],"5x4o3f2wF1n54321");
strcpy(validvs[52],"5y4p3g2xG1o65432");

strcpy(finalstr," ");

        for(a=0;a<strlen(last);a++){

                for(aa=0; aa < sizeof(alphabets); aa++){
                    if(last[a]==alphabets[aa]){

                        strcat(finalstr, validvs[aa]);
                                                    }
                                                        }
                                        }
        printf("\nString Encrypted");
        send(newsocket, finalstr, 1024, 0);

     


					}else if(strcmp(first,commands[4])==0){
						 int i, a, tmpn=0, fnex=0, chfound=0, stt=0, end=0;
       char tempp[28];
       char validvs[54][18], finalstr[1000], alphabets[]={' ','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'};

strcpy(validvs[0],"?");
strcpy(validvs[1],"A");
strcpy(validvs[2],"B");
strcpy(validvs[3],"C");
strcpy(validvs[4],"D");
strcpy(validvs[5],"E");
strcpy(validvs[6],"F");
strcpy(validvs[7],"G");
strcpy(validvs[8],"H");
strcpy(validvs[9],"I");
strcpy(validvs[10],"1iA0");
strcpy(validvs[11],"1jB1");
strcpy(validvs[12],"1kC2");
strcpy(validvs[13],"1lD3");
strcpy(validvs[14],"1mE4");
strcpy(validvs[15],"1nF5");
strcpy(validvs[16],"1oG6");
strcpy(validvs[17],"1pH7");
strcpy(validvs[18],"1qI8");
strcpy(validvs[19],"1r1Ai09");
strcpy(validvs[20],"2s1Bj10");
strcpy(validvs[21],"2t1Ck21");
strcpy(validvs[22],"2u1Dl32");
strcpy(validvs[23],"2v1Em43");
strcpy(validvs[24],"2w1Fn54");
strcpy(validvs[25],"2x1Go65");
strcpy(validvs[26],"2y1Hp76");
strcpy(validvs[27],"2z1Iq87");
strcpy(validvs[28],"2a1r1Ai098");
strcpy(validvs[29],"2b2s1Bj109");
strcpy(validvs[30],"3c2t1Ck210");
strcpy(validvs[31],"3d2u1Dl321");
strcpy(validvs[32],"3e2v1Em432");
strcpy(validvs[33],"3f2w1Fn543");
strcpy(validvs[34],"3g2x1Go654");
strcpy(validvs[35],"3h2y1Hp765");
strcpy(validvs[36],"3i2z1Iq876");
strcpy(validvs[37],"3j2a1rA1i0987");
strcpy(validvs[38],"3k2b2sB1j1098");
strcpy(validvs[39],"3l3c2tC1k2109");
strcpy(validvs[40],"4m3d2uD1l3210");
strcpy(validvs[41],"4n3e2vE1m4321");
strcpy(validvs[42],"4o3f2wF1n5432");
strcpy(validvs[43],"4p3g2xG1o6543");
strcpy(validvs[44],"4q3h2yH1p7654");
strcpy(validvs[45],"4r3i2zI1q8765");
strcpy(validvs[46],"4s3j2a1rA1i09876");
strcpy(validvs[47],"4t3k2b2sB1j10987");
strcpy(validvs[48],"4u3l3c2tC1k21098");
strcpy(validvs[49],"4v4m3d2uD1l32109");
strcpy(validvs[50],"5w4n3e2vE1m43210");
strcpy(validvs[51],"5x4o3f2wF1n54321");
strcpy(validvs[52],"5y4p3g2xG1o65432");

         do{
            tmpn=0; /*reset tmpn*/

            for(i=stt;i<=end;i++){
                    sprintf(&tempp[tmpn],"%c",last[i]);
                    tmpn++;
                                 }
            for(a=1;a<=52;a++){
                    if(!strcmp(tempp,validvs[a])){
                        sprintf(&finalstr[fnex],"%c", alphabets[a]);
                        fnex++;
                        chfound=1;
                        stt=end+1;
                        end=end+1;
                        break;
                                                }
                              }

            if(chfound==0){
                    end=end+3;
                          }
            else{
                    chfound=0;
            }
            if(last[end]==' ' || end >= strlen(last) ){
                    break;
            }
         }
         while(chfound==0);
        printf("\nString Decrypted");

        send(newsocket, finalstr, 1024, 0);



					}else if(strcmp(first,commands[2])==0){

						

					}else if(strcmp(first,"delete")==0){
						printf("\n%s", last);
						char first1[20];
						char last1[100];
						char** SplitJob;//will carry the splitted job
					    SplitJob = Split(last,' ');


					    
					    /*
						strcpy(first1,*(SplitJob));//getting the task		
						strcpy(last1,*(SplitJob + 1));//getting the string


								char *prt = LastCharacter(last1);
								//First Character
								char *ptr = FirstCharacter(last1);
								int dec = 0;
								for(i=0; i<strlen(ptr); i++){
									dec = dec * 10 + ( ptr[i] - '0' );
								}
								dec = dec - 1;
								// Selecting the First and last Characters
								char *ward = malloc(strlen(first1 + 1));
								strcpy(ward, first1);
								for(dec; dec<strlen(first1); dec++){
									char *letter = ward + dec;
									char tempt;
									tempt = *(letter + 1);
									*letter = tempt;
								}
								int dim = 0;
								for(i=0; i<strlen(prt); i++){
									dim = dim * 10 + ( prt[i] - '0' );
								}
								dim = dim-2;
								for(dim; dim<strlen(first1); dim++){
									char *letter = ward + dim;
									char tempt;
									tempt = *(letter + 1);
									*letter = tempt;
								}
								// send deleted characters	
								send(newsocket, ward, 1024, 0);	
								printf("Specified characters Deleted\n"); */

					}else{
						int wt= (last[0] - '\0'-48);
						int tb = (last[2] - '\0'-48);
						for(i=0;i<=strlen(last);i++){
							if(((last[i]==last[wt-1]) && i==(wt-1)) || ((last[i]==last[tb-1]) && i==(tb-1))){
								continue;	
							}
						}
						
						
					}
				
				}
				
			}
		}
	}
	close(newsocket);
	return 0;

}char *FirstCharacter(char *line){
		char *character = strtok(line,",");
		return character;
}
//Function for getting the Last character after ','
char *LastCharacter(char *line){
		char *wipe = strrchr(line,',')+1;
		return wipe;
}
// Function to concatenate the strings entered by the User
char *concat(const char *s1, const char *s2){
	char *result = malloc(strlen(s1) + strlen(s2) + 1);
	strcpy(result, s1);
	strcat(result, s2);
	return result;
}
//function for first word in string
char *FirstWord(char *line){
		char *word = strtok(line," ");
		return word;
}
//function for last word in string
char *LastWord(char *line){
		char *word =strrchr(line,' ')+1;
		return word;
}

char** Split(const char *str, char delimiter){
	int len, i, j;
	char* buf;
	char** ret;
	len = strlen(str);
	buf = malloc(len + 1);
	memcpy(buf, str, len + 1);
	j = 1;
	for (i = 0; i < len; ++i){
		if (buf[i] == delimiter){
			while (buf[i + 1] == delimiter) i++;
			j++;
		}
	}
	ret = malloc(sizeof(char*) * (j + 1));
	ret[j] = NULL;
	ret[0] = buf;
	j = 1;
	for (i = 0; i < len; ++i){
		if (buf[i] == delimiter){
			buf[i] = '\0';
			while (buf[i + 1] == delimiter) i++;
			ret[j++] = &buf[i + 1];
		}
	}
	return ret;
}
