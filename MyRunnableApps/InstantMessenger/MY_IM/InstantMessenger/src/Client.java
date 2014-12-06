import javax.swing.*;

import java.awt.*;
import java.awt.event.*;
import java.io.*;
import java.net.*;

public class Client extends JFrame
{
	private JTextField userText;
	private JTextArea chatWindow;
	private ObjectOutputStream output;
	private ObjectInputStream input;
	private String message="";
	private String serverIP;
	private Socket connection;
	
	public Client(String host)
	{
		super("Sunil's client");
		serverIP=host;
		
		userText=new JTextField();
		userText.setEditable(false);
		userText.addActionListener(
				new ActionListener()
				{
					public void actionPerformed(ActionEvent event)
					{
						sendMessage(event.getActionCommand());
						userText.setText("");
					}
				}
				);
		add(userText, BorderLayout.NORTH);
		chatWindow=new JTextArea();
		add(new JScrollPane(chatWindow));
		setSize(300,150);
		setVisible(true);
	}
	
	public void startRunning()
	{
				try{
					connectToServer();
					setupStreams();
					whileChatting();
				}
				catch (EOFException eofex)
				{
					showMessage("\n Client terminated connection");
				}
				catch (IOException ioex)
				{
					ioex.printStackTrace();
				}
				finally 
				{
					closeCrap();
				}
			
	}
	
	private void connectToServer() throws IOException
	{
		showMessage("Attempting Connection!\n");
		connection=new Socket(InetAddress.getByName(serverIP),8080);
		showMessage("Connected to "+connection.getInetAddress().getHostName());
	}
	
	private void setupStreams() throws IOException
	{
		output=new ObjectOutputStream(connection.getOutputStream());
		output.flush();
		input=new ObjectInputStream(connection.getInputStream());
		showMessage("\nStreams are now setup! \n");
	}
	
	private void whileChatting() throws IOException
	{
		ableToType(true);
		do
		{
			try
			{
				message=(String) input.readObject();
				showMessage("\n"+message);
			}
			catch (ClassNotFoundException cnfe)
			{
				showMessage("\n WTF");
			}
		}while(!message.equals("SERVER - END"));
	}
	
	private void closeCrap() 
	{
		showMessage("\n Closing crap down....");
		ableToType(false);
		try
		{
			output.close();
			input.close();
			connection.close();
		}
		catch(IOException ioe)
		{
			ioe.printStackTrace();
		}
	}

	private void sendMessage(String message)
	{
		try{
			output.writeObject("CLIENT - "+message);
			output.flush();
			showMessage("\nCLIENT - "+message);
		}
		catch(IOException ioe)
		{
			chatWindow.append("\nSomething messed uup while sending message");
		}
	}

	private void showMessage(final String m)
	{
		SwingUtilities.invokeLater(
					new Runnable()
					{
						public void run()
						{
							chatWindow.append(m);
						}
					}
				);
	}

	private void ableToType(final boolean tof)
	{
		SwingUtilities.invokeLater(
				new Runnable()
				{
					public void run()
					{
						userText.setEditable(tof);
					}
				}
			);
		
	}
	
}

