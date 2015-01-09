package gui;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JTextField;
import javax.swing.JComboBox;
import javax.swing.DefaultComboBoxModel;

import java.awt.Color;

import javax.swing.JButton;
import javax.swing.JTextPane;

import java.awt.Font;

import javax.swing.JTextArea;
import javax.swing.AbstractAction;

import java.awt.event.ActionEvent;

import javax.swing.Action;

import search.SearchDriver;

import java.awt.event.ActionListener;

public class googleconsole extends JFrame 
{
	SearchDriver c=new SearchDriver();
	private JPanel contentPane;
	private JTextField textField;
	private JTextField txtMyGoogle;
	private final Action action = new SwingAction();
	private JButton btnNewButton;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) 
	{
		EventQueue.invokeLater(new Runnable() 
		{
			public void run() {
				
				try {
					googleconsole frame = new googleconsole();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public googleconsole() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(127, 255, 212));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		textField = new JTextField();
		textField.setBackground(Color.WHITE);
		textField.setBounds(120, 126, 157, 20);
		contentPane.add(textField);
		textField.setColumns(10);
		
		final JComboBox comboBox = new JComboBox();
		comboBox.setModel(new DefaultComboBoxModel(new String[] {"Select DS", "list", "hash", "myhash", "bst", "avl"}));
		comboBox.setBounds(22, 126, 73, 20);
		contentPane.add(comboBox);
		
		txtMyGoogle = new JTextField();
		txtMyGoogle.setBackground(new Color(0, 255, 255));
		txtMyGoogle.setFont(new Font("Tahoma", Font.BOLD, 33));
		txtMyGoogle.setEditable(false);
		txtMyGoogle.setText("my Google");
		txtMyGoogle.setBounds(123, 41, 190, 53);
		contentPane.add(txtMyGoogle);
		txtMyGoogle.setColumns(10);
		
		final JTextArea txtrSearchResults = new JTextArea();
		txtrSearchResults.setEditable(false);
		txtrSearchResults.setBounds(22, 174, 372, 77);
		contentPane.add(txtrSearchResults);
		
		btnNewButton = new JButton("Search");
		btnNewButton.addActionListener(new ActionListener()
		{
			public void actionPerformed(ActionEvent e)
			{
				SearchDriver s = new SearchDriver();
				client_server cs=new client_server();
				 
			    String key1 = textField.getText();
	            String key2 = textField.getText();
	       String []arg = new String[5];
	       arg[0] = comboBox.getSelectedItem().toString();
	       arg[1] = comboBox.getSelectedItem().toString();//"list";
	       arg[2] = key1;
	       arg[3] = comboBox.getSelectedItem().toString();
	       arg[4] =key2;
	       String v=arg[1]+" "+arg[2]+" "+" "+arg[3]+" "+arg[4];
	       String st;
		try {
			st = client_server.main(v);
			txtrSearchResults.append(st);
		} catch (Exception e1) 
		{
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	       
	      
			}
		});
		btnNewButton.setBounds(300, 125, 89, 23);
		contentPane.add(btnNewButton);
		 
	}
	private class SwingAction extends AbstractAction {
		public SwingAction() {
			putValue(NAME, "SwingAction");
			putValue(SHORT_DESCRIPTION, "Some short description");
		}
		public void actionPerformed(ActionEvent e) 
		{
		}
	}
}
