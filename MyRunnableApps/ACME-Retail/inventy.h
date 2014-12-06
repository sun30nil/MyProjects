//this includes the inventory items and upadating also takes place here.
char bu[100];
struct inventory
{
    char Product_id[70];
    char Date[70];
    char Stid[55];
    int Opening_balance;
    int Current_sales;
    int Closing_balance;
    int price;
}inv;
 
 
check_inventory()
{
                 role();  //verify the SI
      FILE *f1,*f2;
      printf("\n Enter todays date: ");
      scanf("%s",inv.Date);
      f1=fopen("STOREDATA\\STORES\\storied_delivery.bin","rb");
      f2=fopen("STOREDATA\\STORES\\inventory.bin","ab");
      while(!feof(f1))
      {
        fread(&RO,sizeof(RO),1,f1);
        
        printf("\n You are viewing inventory for %s\n",RO.ProID);
        strcpy(inv.Product_id,RO.ProID);
        inv.Opening_balance=(RO.Qty-RO.mortality);
        
        inv.price=RO.price;
        printf("\n Enter the current quantity sold: ");
        scanf("%d",&inv.Current_sales);
        strcpy(inv.Stid,RO.stid);
        inv.Closing_balance=(inv.Opening_balance-inv.Current_sales);
        printf("\nProID  OpenBal  CurSal  ClosBal  CurDat    StrID\n");
        sprintf(bu,"\n%s  %d  %d  %d   %s  %s\n",inv.Product_id,inv.Opening_balance,inv.Current_sales,inv.Closing_balance,inv.Date,inv.Stid);
                printf("%s",bu);
        
        fwrite(&inv,sizeof(inv),1,f2);
        }
        fclose(f1);
        fclose(f2);
        opt();
}
