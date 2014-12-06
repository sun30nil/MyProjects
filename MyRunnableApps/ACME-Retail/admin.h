//this is the admin login page and also asks for the menu
login()
{  
      int x,y,o;
      char uid[10]="ADMIN",pass[10]="ADMIN",oiu[10],oip[10];
      printf("\n                   ACME Chicken Retail                    \n");
      printf("\nPlease Login Here: \n\n");
      label1:
      printf("\n");
      printf("\tUsername:");
      scanf("%s",oiu);
      printf("\tPassword:");
      scanf("%s",oip);
      x=strcmp(uid,oiu);
      y=strcmp(pass,oip);
      if(x==0&&y==0)
                   {
                    printf("\nSuccessfully Logged In. \n");
                    printf("\n\t\t\tWelcome to ACME Chicken Store!\n");
                   opt();
                    }
                    else
                    {
                        printf("\nInvalid Username or Password, please try again");
                        login();
                        }
}


opt()
{
    int m;
    fflush(stdin);
    printf("\n\n\t************ Administrator: ****************\n");
    printf("\n1. Add Store");
    printf("\t\t2. Add Product");
    printf("\t\t3. Generate Reports\n\n");
    
    printf("\n\n\t************ Store Incharge: *****************\n\n");
    printf("4. Create Order");
    printf("\t\t 5. Received Order");
    
    printf("\n\n\t************* Cashier: ***********************");
    printf("\n\n6. Check Inventory");
    printf("\t7. Point of Sale Operations\n\n");
    printf("*******\n");
    printf("8. Exit \n") ;
    printf("*******\n");
    scanf("%d", &m);
    
    switch (m)
    {
             case 1: 
                  Addstore();
                  break;
             case 2:
                  Addproduct();   
                  break;
             case 3:
                  reports();
                  break;
             case 4:
                  placing_orders();
                  break;
             case 5:
                  received_orders();
                  break;
                  
             case 6:
                    check_inventory();
                    break;
             case 7:
                  POS();
                  break;
             case 8:
                   exit(1);
     }
}

