//login for Cashier to carry POS operations
struct invoice
          {
          int qty,price,total,grand;
          char Sal_tx[50], list[100];
          char dat[40];
          char cus_ph[10];
          }bill;       
items_available()
{ 
     fflush(stdin);
     FILE *p1;
     p1=fopen("STOREDATA\\STORES\\inventory.bin","rb");
     rewind(p1);
     if(p1==NULL)
                {
                 printf("\n Unable to display the items available. Please check the store ID");
                 }
                  getchar();
                 printf("\n Qty      ProductID       Prodprice       StoreID\n");
                 while(!feof(p1))
                     { 
                     fread(&inv,sizeof(inv),1,p1);
                     printf("\n%d  %s    %d   %s", inv.Opening_balance,inv.Product_id,inv.price,inv.Stid);
                     }
                 printf("\n There are no more items available");
       fclose(p1);  
       POS();     
}  

new_sale()
{
          int x;
          char b[100],t[100];
          fflush(stdin);
          printf("\nEnter the date: ");
          gets(bill.dat);
          printf("\nEnter the customer phone number: ");
          gets(bill.cus_ph);
          FILE *p1;
          FILE *p2;
     p1=fopen("STOREDATA\\STORES\\inventory.bin","rb");
     fread(&inv,sizeof(inv),1,p1);
     sprintf(b,"STOREDATA\\STORES\\Invoice_%s.bin",inv.Stid);
     p2=fopen(b,"wb");
     rewind(p1);
     if(p1==NULL)
                {
                 printf("\n Unable to display the items available. Please check the store ID");
                 }
                  getchar();
                 printf("\n Qty      ProductID       Prodprice       StoreID\n");
                 while(!feof(p1))
                 {
                     fflush(stdin); 
                     fread(&inv,sizeof(inv),1,p1);
                     printf("\n%d  %s    %d   %s", inv.Opening_balance,inv.Product_id,inv.price,inv.Stid);
                     printf("\n Do you want to put it in the shopping cart?\n1.Yes\n2.No\n");
                     scanf("%d",&x);
                     if(x==1)
                     {
                             fflush(stdin);
                             sprintf(t,"%s-%s",inv.Stid,inv.Product_id);
                             strcpy(bill.Sal_tx,t);
                             strcpy(bill.list,inv.Product_id);
                             printf("\nQuantity to be purchased: ");
                             scanf("%d",&bill.qty);
                             fflush(stdin);
                             bill.price=inv.price;
                             bill.total=(bill.price)*(bill.qty);
                             bill.grand=(1.05*(bill.price)*(bill.qty));// tax inculed here as 1.05% of the actual cost
                             printf("\nTxnID   Product    Qty    Price   Total   Inc. Tax");
                             printf("\n%s    %s      %d      %d     %d       %d",bill.Sal_tx,bill.list,bill.qty,bill.price,bill.total,bill.grand);
                             fwrite(&bill,sizeof(bill),1,p2);
                     }
                 } 
                 printf("\n There are no more items available.");                    
       fclose(p1);
       fclose(p2);                          
       POS();        
}         
                   
POS()
{
     role();
        int a;
         printf("\nMenu\n\n1.Items Available\n2.New Sale\n3.Main Menu\n4.Exit\n");
         scanf("%d",&a);
         switch(a)
         {
                  case 1:
                          items_available();
                          break;
                          
                  case 2:
                       new_sale();
                        break;
                        
                  case 3:
                       opt();
                       break;
                  case 4:
                       exit(1);
         }
    
}     
