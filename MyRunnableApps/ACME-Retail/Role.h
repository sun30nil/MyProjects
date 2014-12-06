// this will verify the user loggin  as SI or cashier
role()
{
       char t[20],k[20];
      int b;
       FILE *fp4;
       fp4=fopen("STOREDATA\\HEADOFFICE\\storesm.bin","rb"); 
       rewind(fp4);
       label12:
      printf("\n Select your role to login: \n1.Store Incharge\n2.Cashier\n3.Main Menu");
      scanf("%d", &b);
      fflush(stdin);
      printf("\nUsername: ");
      gets(t); 
      printf("\nPassword: ");
      gets(k); 
      if (b==1)
                       {
                             while(!feof(fp4))
                             {
                              fread(&z,sizeof(z),1,fp4);
                           //   printf("-%s-%s-",z.SIuname,z.SIpass);
                             if((strcmp(t,z.SIuname))==0&&(strcmp(k,z.SIpass))==0)
                              {printf("\n\tLogin successful as Store Incharge!\n");goto label9;}
                              } 
                                printf("\nInvalid Username or Password. Please try again\n");goto label12; 
                       }
       else if(b==2)
                       {
                              while(!feof(fp4))
                              {
                                 fread(&z,sizeof(z),1,fp4); 
                                 if((strcmp(t,z.Cuname))==0&&(strcmp(k,z.Cpass))==0)
                                 {printf("\n\tLogin successful as cashier!\n");goto label9;}
                               }
                               printf("\nInvalid Username or Password. Please try again\n");goto label12;
                       }
                       
             else if(b==3) {opt();} 
                       label9:                
            fclose(fp4);
            
            fflush(stdin);
            getchar();
}  
