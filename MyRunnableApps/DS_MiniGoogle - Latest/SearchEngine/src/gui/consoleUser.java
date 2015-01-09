package gui;

import java.awt.Color;

import javax.swing.JFrame;

import search.SearchDriver;

public class consoleUser extends javax.swing.JFrame 
{

    public consoleUser() 
    { 
    	initComponents(); 
    }

    private void initComponents() 
    {
    	jframe=new JFrame();
    	
        jTextField1 = new javax.swing.JTextField();
        jTextField2 = new javax.swing.JTextField();
        
        jComboBox1 = new javax.swing.JComboBox();
        jComboBox2 = new javax.swing.JComboBox();
        
        jButton1 = new javax.swing.JButton();
        
        jScrollPane1 = new javax.swing.JScrollPane();
        
        jTextArea1 = new javax.swing.JTextArea();
        
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
       
        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jComboBox1.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "and", "or", "diff" }));
        jframe.add(jComboBox1);
        jComboBox2.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "list", "hash", "myhash", "bst", "avl" }));
        jframe.add(jComboBox2);
        jButton1.setText("search");
        jframe.add(jButton1);
      
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                try {
					jButton1ActionPerformed(evt);
				} catch (Exception e) {
					
					e.printStackTrace();
				}
            }
        });

        jTextArea1.setColumns(20);
      
        jTextArea1.setRows(5);
        jframe.add(jTextArea1);
        jScrollPane1.setViewportView(jTextArea1);
        jframe.add(jScrollPane1);
        jLabel1.setBackground(new java.awt.Color(0, 204, 255));
        jLabel1.setFont(new java.awt.Font("Times New Roman", 0, 14));
        jLabel1.setForeground(new java.awt.Color(0, 0, 255));
        jLabel1.setText("Key 1");
        jframe.add(jLabel1);
        jLabel2.setFont(new java.awt.Font("Times New Roman", 0, 14)); 
        jLabel2.setForeground(new java.awt.Color(0, 51, 204));
        jLabel2.setText("Key 2");
        jframe.add(jLabel2);
        jLabel3.setFont(new java.awt.Font("Book Antiqua", 1, 40)); 
        jLabel3.setForeground(new java.awt.Color(0,0,200));
        jLabel3.setText("my Google");
        jframe.add(jLabel3);
       
       getContentPane().setBackground(Color.orange);
        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING).addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(26, 26, 26)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 61, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 70, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jTextField1, javax.swing.GroupLayout.PREFERRED_SIZE, 94, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jTextField2, javax.swing.GroupLayout.PREFERRED_SIZE, 91, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                        .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                            .addGap(224, 224, 224)
                            .addComponent(jComboBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(49, 49, 49)
                            .addComponent(jComboBox2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jButton1))
                        .addGroup(javax.swing.GroupLayout.Alignment.LEADING, layout.createSequentialGroup()
                            .addGap(68, 68, 68)
                            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 424, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(41, 41, 41)
                        .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 482, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(59, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(22, 22, 22)
                .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 50, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 22, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jTextField1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jComboBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jComboBox2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton1))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jTextField2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 18, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 140, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        ); 

        pack();
    }// </editor-fold>  

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) throws Exception {

        // TODO add your handling code here:
        SearchDriver s = new SearchDriver();
           client_server c=new client_server();
          String key1 = jTextField1.getText();
          String key2 = jTextField2.getText();
       String []arg = new String[5];
       arg[0] = jComboBox2.getSelectedItem().toString();
       arg[1] = jComboBox2.getSelectedItem().toString();//"hash";
       arg[2] = key1;
       arg[3] = jComboBox1.getSelectedItem().toString();
       arg[4]=key2;
       String v=arg[1]+" "+arg[2]+" "+" "+arg[3]+" "+arg[4];
      String st=c.main(v);
      if(st!=null)
     jTextArea1.append(st);
      else  jTextArea1.append("Searched key(s) not found!");
    }

   
    public static void main(String args[]) 
    {
        java.awt.EventQueue.invokeLater(new Runnable() 
        {
            public void run() 
            {
                new consoleUser().setVisible(true);
                
            }
        });
    }

  
    private javax.swing.JFrame jframe;
    private javax.swing.JButton jButton1;
    
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    
    private javax.swing.JComboBox jComboBox1;  //for selecting DS
    private javax.swing.JComboBox jComboBox2;  //for selecting sets
    
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jTextArea1;
    private javax.swing.JTextField jTextField1;
    private javax.swing.JTextField jTextField2;
      

}
