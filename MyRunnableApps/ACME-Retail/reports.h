//Reports are generated for the head office to evaluate the performance of each store.
char b[50];
struct repo
      {
       char date[40];
       char stid[40];
       char prod_sold[105];
       int qty_sold,revenue;
       }rpts;
reports()
{
         FILE *p1,*p2;
         fflush(stdin);
         printf("\n\n Enter the date: ");
         gets(rpts.date);
         int n,i;
         printf("\nEnter the number of stores for which you want to generate the reports:\n");
         scanf("%d",&n);
         for(i=1;i<=n;i++)
         {
                          fflush(stdin);
             printf("\n\n Enter the store id: ");
             gets(rpts.stid);
             sprintf(b,"STOREDATA\\STORES\\Invoice_%s.bin",rpts.stid);
             
             p1=fopen(b,"rb");
             if(p1==NULL)
                         {
                         printf("\n error opening the invoice file");
                         }
             rewind(p1);
             p2=fopen("STOREDATA\\HEADOFFICE\\Reports.bin","ab");
            while(!feof(p1))
             {
                  fread(&bill,sizeof(bill),1,p1);
                   strcpy(rpts.prod_sold,bill.list);
                   rpts.qty_sold=bill.qty;
                   rpts.revenue=bill.grand;
                   printf("\n\nDate       StrID        ProdID        Qty_Sold        Revenue");
                   printf("\n%s      %s        %s         %d         %d   ",rpts.date,rpts.stid,rpts.prod_sold,rpts.qty_sold,rpts.revenue);
                   fwrite(&rpts,sizeof(rpts),1,p2);
             }
              fclose(p1);
         }
         printf("\n\n This is the end of the report."); 
          
           fclose(p2);
           
           opt();
}    
         
