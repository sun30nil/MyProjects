import javax.swing.*;
public class ClientTest {

	public static void main(String[] args) 
	{
		Client c=new Client("10.3.2.133");
		c.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		c.startRunning();

	}

}
