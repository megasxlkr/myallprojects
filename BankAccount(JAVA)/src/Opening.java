import java.awt.Color;
import java.awt.Font;
import java.awt.GridLayout;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;

public class Opening extends JFrame implements ActionListener{


       	JButton btnEnter;
     	JLabel lblOpening, lblCustomerNumber, lblPassword,lblWarning;
     	JTextField txtCustomerNumber;
     	JPasswordField txtPassword;
     	JPanel panel;
     	JButton btnConfirm;
   
     	public Opening(){
     		
		  
        lblOpening 			= new JLabel("Faturacım");
        
        lblPassword 		= new JLabel("Kimlik Numaranız");
        
        lblCustomerNumber 	= new JLabel("Müşteri Numaranız");
        
        lblWarning 			= new JLabel();
        
        lblOpening.setHorizontalAlignment(JLabel.CENTER);
        lblPassword.setHorizontalAlignment(JLabel.CENTER);
        lblWarning.setHorizontalAlignment(JLabel.CENTER);
        lblCustomerNumber.setHorizontalAlignment(JLabel.CENTER);
        
        
        lblOpening.setForeground(Color.white);
        lblPassword.setForeground(Color.white);
        lblWarning.setForeground(Color.white);
        lblCustomerNumber.setForeground(Color.white);
        
        txtCustomerNumber	= new JTextField(10);
        txtPassword			= new JPasswordField(10);
  
        btnConfirm			= new JButton("Giriş yap");
        
        setLayout(new GridLayout(7,1));
      
        add(lblOpening);
        add(lblCustomerNumber);
        add(txtCustomerNumber);
        add(lblPassword);
        add(txtPassword);
        add(btnConfirm);
        add(lblWarning);
        
        btnConfirm.addActionListener(this);
        
        lblWarning.setVisible(false);
      
        Font font = new Font("Courier", Font.BOLD,15);
        lblOpening.setFont(font);

        
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(400, 300);
        setResizable(false);
        setVisible(true);
        setLocationRelativeTo(null);  
        setBackground(Color.green);
        getContentPane().setBackground(Color.decode("#038253"));      
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		int customerNumber = 0;
		if(txtCustomerNumber.getText().length() > 0) {
			try {
				customerNumber = Integer.parseInt(txtCustomerNumber.getText());
			}catch(Exception exp) {
				
				System.out.println(exp);
				this.lblWarning.setForeground(Color.red);
				this.lblWarning.setVisible(true);
				this.lblWarning.setText("Müşteri numarası sadece rakam içermelidir!");
				return;
			}
			
		}
			
		String password = txtPassword.getText();
		
		DataBase dataBase = new DataBase();		
		
		if(customerNumber == (dataBase.getCustomerNumber()) && password.equals(dataBase.getPassword())) {
			this.lblWarning.setForeground(Color.green);
			this.lblWarning.setVisible(true);
			this.lblWarning.setText("Giriş Başarılı Yönlendiriliyorsunuz...");
			 
			new Content();
		}
		else {
			this.lblWarning.setForeground(Color.red);
			this.lblWarning.setVisible(true);
			this.lblWarning.setText("Hatalı Giriş !");
		}
	}
	
	 
}


