package spider;

import java.util.Scanner;

public class TestMaxPQ 
{

		public static void main(String[] args)
		{
			MaxPQ<String> mpq=new MaxPQ<String>(20);
			Scanner sc = new Scanner(System.in);
			while(true)
				{
				System.out.println("=============Max PQ==============");
				System.out.println("1. Enqueue");
				System.out.println("2. Dequeue");
				System.out.println("3. Size");
				System.out.println("4. Empty or not");
				System.out.println("5. Print the root");
				System.out.println("6. Display");
				System.out.println("7. Exit");
				System.out.println("========================================");
				int ch1=sc.nextInt();
								
				switch(ch1)
				{
				case 1:
					System.out.println("Enter the elements: ");
					sc.nextLine();
					String str=sc.nextLine();
					mpq.enqueue(str);
					break;
				case 2:
					mpq.dequeue();
					break;
				case 3:
					System.out.println("The size of the PQ is: "+mpq.sizePQ());
					break;
				case 4:
					if(mpq.is_empty()==true)
					System.out.println("The PQ is empty");
					else 
						System.out.println("The PQ is not empty");
					break;
				case 5:
						System.out.println("The min element is: "+mpq.front());
						break;
					
				case 6:
					System.out.println("============Displaying==============");
					mpq.iterator();
					System.out.println("========================================");
					break;
				case 7:
					System.exit(0);
				}
				
				
				}

	}

}
