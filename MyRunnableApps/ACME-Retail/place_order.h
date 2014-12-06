// SI will login using his login credentials and place order 
             
FILE *f1,*f2,*f3,*f4;
 int Seq,i=1,en;
 char buffer[100],buffer1[100];
               
  struct prod_ord
              {
               char pnam[41],p_id[41],OrderID[41],deldate[41];
               int qty;
               int p_price;
               char st_id[44];
               }order;

 ordervalid()
 {
              i=1;
             fflush(stdin); 
            printf("\n Enter the quantity you want : ");
            scanf("%d",&order.qty);
            fflush(stdin);
            if(order.qty>500)
                      {
                       printf("\n Your ordered quatity cannot exceed 500");
                       ordervalid();
                       }
                sprintf(order.OrderID,"Ord-%d",i);
                strcpy(order.pnam,pr.pname);
                strcpy(order.p_id,pr.pid);
                order.p_price=pr.pprice;
                sprintf(buffer1,"%s  %s   %d   %d     %s    %s ",pr.pname,pr.pid,pr.pprice,order.qty,order.OrderID,order.deldate);
                printf("%s",buffer1);
                fwrite(&order,sizeof(order),1,f3);  
                getchar();
                i++;
                }       
                   
placing_orders()
{ 
              
             role();// to verify the login credential of SI
             int j=1;
             printf("\n Now you can place order !");
            f1=fopen("STOREDATA\\HEADOFFICE\\Product.bin","rb");
            f2=fopen("STOREDATA\\HEADOFFICE\\ProSeq.bin","rb");
            f3=fopen("STOREDATA\\HEADOFFICE\\placeord.bin","ab");
             f4=fopen("STOREDATA\\HEADOFFICE\\storesm.bin","rb");
            rewind(f1);
            rewind(f4);
            if(f1==NULL)
            {
                printf("\n error opening the file product.bin");
                }
            fread(&z,sizeof(z),1,f4);
           
           
            fscanf(f2,"%d", &Seq);
            printf("\n Number of products available:  %d",Seq);
            fclose(f2);
            printf("\n Enter the delivery date : ");
            scanf("%s",&order.deldate);
            getchar();
            getchar();
            while (j<=Seq)  
            {
             fread(&pr,sizeof(pr),1,f1);  
            printf("\nProduct     Product ID    Product price    StoreID\n\n");
            sprintf(buffer,"%s     %s     %d     %s",pr.pname,pr.pid,pr.pprice,z.Sid);
            printf("%s",buffer);
            strcpy(order.st_id,z.Sid);
            printf("\n Do you want to order this item: \n1.Yes\n2.No\n");
            scanf("\n %d", &en);
            if (en==1)
               { 
               ordervalid();
               }
              j++;  
            }
            printf("\n There are no more products available.");
            fclose(f1);
            fclose(f4);
            fclose(f3);
            opt();
}
            
  /* 
{
      fflush(stdin);
      role();
       placeorder();
      
   char oiu[10],oip[10];
      printf("\nPlease Login Here to place an order: \n\n");
      label1:
      printf("\n");
      printf("\tUsername:");
      gets(oiu);
      printf("\tPassword:");
      gets(oip);
    /* FILE *f1;
      f1=fopen("STOREDATA\\STORES\\Raj1.bin","rb");
      rewind(f1); 
     fread(&z,sizeof(z),1,f1);
      printf("\n%s\n%s",z.SIuname,z.SIpass);if((strcmp(uid,z.SIuname)==0)&&(strcmp(pass,z.SIpass)==0)) 
      if((strcmp(oiu,"ADMIN")==0)&&(strcmp(oip,"ADMIN")==0)) 
                   {
                    printf("\nSuccessfully Logged In as the Store Incharge. \n");
                    printf("\n\t\t\tYou can now place order!\n");
                    getchar();
                   placeorder();
                    }
                    else
                    {
                        printf("\nInvalid Username or Password, please try again");
                        goto label1;
                        } */
                                                

