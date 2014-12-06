//store creation takes place here
int Seq;
struct store
             {
             char SIfname[15],SIlname[15],loc[15],Cfname[15],Clname[15], sph[10];
             char Sid[30],SIuname[30],SIpass[30],Cuname[30],Cpass[30];
             }z={};

 Addstore()
 {
           
      int o;     
      printf("\n What would you like to do?\n1.Create a new store\n2.Exit\n");
      scanf("%d",&o);
      if(o==1)
      {
              goto label2;
              }
      label2:
             fflush(stdin);
//structure declaration and data validation        
          printf("\n Enter first name of Store Incharge: ");
          scanf("%s",&z.SIfname);
           if(strlen(z.SIfname)<3)
           {
            printf("\n Invalid entry."); 
            goto label2;
            }  
          label3:
          printf("\n Enter last name of Store Incharge: ");
          scanf("%s",&z.SIlname);
          if(strlen(z.SIlname)<3)
          {
            printf("\n Invalid entry."); 
            goto label3;
            }  
          label4:
          printf("\n Enter first name of Cashier: ");
          scanf("%s",&z.Cfname);
          if(strlen(z.Cfname)<3)
          {
            printf("\n Invalid entry."); 
            goto label4;
            }  
          label5:
          printf("\n Enter last name of Cashier: ");
          scanf("%s",&z.Clname);
          if(strlen(z.Clname)<3)
          {
            printf("\n Invalid entry."); 
            goto label5;
            }  
          label6:
          printf("\n Enter the location of the shop: ");
          scanf("%s",&z.loc);
          if(strlen(z.loc)<3)
          {
            printf("\n Invalid entry."); 
            goto label6;
            }  
          label7:
          printf("\n Enter a valid phone number: ");
          scanf("%s",&z.sph);
          if(strlen(z.sph)!=10)
          {
            printf("\n Invalid entry."); 
            goto label7;
            }
          
FILE *fp2,*f;
          fp2=fopen("STOREDATA\\STORES\\SeqNo.bin","rb");
          if(fp2==NULL)
          {
                   Seq=1;
                   f=fopen("STOREDATA\\STORES\\SeqNo.bin","wb");
                   fprintf(f,"%d", Seq);
                   fclose(f);
          }
          else
          {
              fscanf(fp2,"%d", &Seq);
              Seq=Seq+1;
              printf("\n Store No.%d",Seq); 
              fp2=fopen("STOREDATA\\STORES\\SeqNo.bin","wb");
                   fprintf(fp2,"%d", Seq);
                   fclose(fp2);        
           }
 
// printf("\n the seq no is :%d", Seq);
        FILE *fp1;
           char buffer[10],locf[3],s1[10],s2[10],lo[10];
           s1[3]='\0',s2[3]='\0';
          strncpy(locf,z.loc,3);
          locf[3]='\0';
          sprintf(lo,"%s-%d",locf,Seq);
          sprintf(buffer,"STOREDATA\\STORES\\%s%d.bin", locf,Seq);
      //    printf("\n%s",buffer);
          getchar();
//generating above the loc.seq no
//opening the stores directory to write the data in the file "loc.seqno."       
        
     //     printf("\n%s",buffer);
          fp1=fopen(buffer,"wb");
                    getchar();
          if(fp1 == NULL)
          {
                   printf("Error in opening the file");
          }
          else printf("\n\n File opened successfully for stores!");
//opening the Headoffice directory
          FILE *fp4;
         fp4=fopen("STOREDATA\\HEADOFFICE\\storesm.bin","ab");
         if(fp4 == NULL)
          {
                   printf("Error in opening the file storesm.bin");
          }
          else printf("\n File opened successfully for Headoffice record");
                   
          
              
            strcpy(z.Sid,lo);
       
         
          sprintf(buffer,"%s.%s", z.SIfname,z.SIlname);
          strcpy(z.SIuname,buffer);
                
          strncpy(s1,z.SIlname,3);
          strncpy(s2,z.sph,3);
          strcat(s1,s2);
          strcpy(z.SIpass,s1);
   
          sprintf(buffer,"%s.%s", z.Cfname,z.Clname);
          strcpy(z.Cuname,buffer);
    
          strncpy(s1,z.Clname,3);
          strncpy(s2,z.sph,3);
          strcat(s1,s2);
          strcpy(z.Cpass,s1);
   
         fwrite(&z,sizeof(z),1,fp1);  
         fwrite(&z,sizeof(z),1,fp4); 
         fclose(fp1);
          fclose(fp4);
          
          printf("\n**** The store data was created successfully!****");  
                  
      fflush(stdin);
      getchar();   
      opt();   
}
         
         
