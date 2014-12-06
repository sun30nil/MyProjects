//SI will verify the order received 
char buf11[100],buffe[50],w;
struct receive_order
      {
      char roid[50];
      char rodate[50];
       char challan[50];
       char ProID[50];
       char Pname[50];
       int price;
       int Qty;
       int mortality;
       char stid[50];
       }RO;
       

 received_orders()
{
        role();   //to verify the login of SI
              FILE *p1,*p2;
              p1=fopen("STOREDATA\\HEADOFFICE\\placeord.bin","rb");
            rewind(p1); 
            p2=fopen("STOREDATA\\STORES\\storied_delivery.bin","ab");
            while (!feof(p1))  
            {
                  
                  getchar();
                  fread(&order,(sizeof(order)),1,p1);
                  sprintf(buffe,"%s-%s",order.p_id,order.OrderID);
                  strcpy(RO.challan,buffe);
                  
                  strcpy(RO.stid,order.st_id);
                  RO.price=order.p_price;
                  strcpy(RO.roid,order.OrderID);
                  strcpy(RO.ProID,order.p_id);
                  strcpy(RO.Pname,order.pnam);
                  RO.Qty=order.qty;
                  printf("\n Enter the date of the order recieved: ");
                  scanf("%s",&RO.rodate);
                  printf("\n Enter the damaged quantity : ");
                  scanf("%d",&RO.mortality);
                  printf("\n Challan RxorID PrID Pname RecOrdate RxQty Mort stid\n\n");
                  sprintf(buf11,"1)%s  2)%s   3)%s    4)%s  5)%s   6)%d   7)%d   8)%s",RO.challan,RO.roid,RO.ProID,RO.Pname,RO.rodate,RO.Qty,RO.mortality,RO.stid);
               printf("%s",buf11);
               getchar();
               printf("\n Did you order this ?\nY\nN");
               scanf("%c", &w);
                          if(w=='Y')
                            {   fwrite(&RO,sizeof(RO),1,p2);   }
             }
             printf("\n\nNo more orders available");
                fclose(p1);
                fclose(p2);
                opt();
}                
                  
                  
/*
{
      fflush(stdin);
      char oiu[10],oip[10];
      printf("\nPlease Login Here to receive the order: \n\n");
      label1:
      printf("\n");
      printf("\tUsername:");
      gets(oiu);
      printf("\tPassword:");
      gets(oip);
      if((strcmp(oiu,"ADMIN")==0)&&(strcmp(oip,"ADMIN")==0)) 
                   {
                    printf("\nSuccessfully Logged In as the Store Incharge. \n");
                    printf("\n\t\t\tYou can now verify received order!\n");
                    getchar();
                    receiveorder();
                    }
                    else
                    {
                        printf("\nInvalid Username or Password, please try again");
                        goto label1;
                        }
                                                
}
*/
