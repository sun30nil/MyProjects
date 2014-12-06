//the headoffice uses this to create a product list which can be used by the SI to place the orders
int  Seq;
struct product
              {
               char pname[15],pid[15];
               int pprice;
               }pr;
newpro()
{ 
        fflush(stdin);
          printf("\n Enter the name of the product: ");
          gets(pr.pname);
          printf("\n Enter the price of the product: ");
          scanf("%d", &pr.pprice);
          FILE *p1,*p2,*f;
          p1=fopen("STOREDATA\\HEADOFFICE\\Product.bin","ab");  
         p2=fopen("STOREDATA\\HEADOFFICE\\ProSeq.bin","rb");
         if(p2==NULL)
          {
                   Seq=1;  
                   f=fopen("STOREDATA\\HEADOFFICE\\ProSeq.bin","wb");
                   fprintf(f,"%d", Seq);
                   fclose(f);
          }
          else
          {
              fscanf(p2,"%d", &Seq);
              Seq=Seq+1;
              printf("\n seq NO......%d",Seq); 
              p2=fopen("STOREDATA\\HEADOFFICE\\ProSeq.bin","wb");
                   fprintf(p2,"%d", Seq);
                   fclose(p2);        
           }
         
          sprintf(pr.pid,"%s-%d", pr.pname,Seq);
         fwrite(&pr,sizeof(pr),1,p1);
         fclose(p1);
          printf("\n You have successfully created the product details\n");
          getchar();
         
}
updatep()
{
         struct product pr;
         fflush(stdin);
         char pupdate[15];
         int newprice;
         label4:
         printf("\n Enter the product id you want to update :");
         gets(pupdate);
         
          FILE *p1,*p2;
          p1=fopen("STOREDATA\\HEADOFFICE\\Product.bin","rb"); 
          while(!feof(p1))
          {
                fread(&pr,sizeof(pr),1,p1);
                
                if(strcmp(pupdate,pr.pid)==0)
                {
                  printf("\n Enter the new price: ");
                  scanf("%d",&newprice); }
                  else{ printf("Product id not found "); goto label4;   }                    
                
                  p2=fopen("STOREDATA\\HEADOFFICE\\Product.bin","wb");
                 pr.pprice=newprice;
                fwrite(&pr.pprice,sizeof(pr),1,p2);
          }
        fclose(p2);
        fclose(p1);
        printf("\n The price of the product was successfully updated");                                    
} 
delp()
{
  printf("\nI'm Sorry. Currently this option is not available. Will be updated soon.\n*****Please keep visiting!******");
      
}

Addproduct()
{
     // login verification for the Administrator
     int p;       
     char OIid[10],OIpass[10];
      label1:
             fflush(stdin);
      printf("\n Enter your login ID: ");
      gets(OIid);
      printf("\n Enter your password: ");
      gets(OIpass);
      
        
         if( (strcmp(OIid,"ADMIN")==0)&&(strcmp(OIpass,"ADMIN")==0))
         {
             printf("\n\n You have successfully logged in.");
             }
             else
             {
             printf("\nInvalid input. Please try again");
             goto label1;
             } 
             label3:       
      printf("\n\n Select what you would like to do:");
      printf("\n\n1. Create new product\n2. Update product price\n3. Delete Product\n4. Go to menu\n");
      scanf("%d",&p);
      
      switch(p)
      {
               case 1:
                    newpro();
                    goto label3;
                    break;
               case 2:
                    updatep();
                    goto label3;
                    break;
               case 3:
                    delp();
                    break;  
           case 4:
                opt();
                break;
      }
      
      
fflush(stdin);
getchar();
opt();  
}
