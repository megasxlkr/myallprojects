import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Component;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.SwingConstants;

public class ContentFatura {
	
	 public ContentFatura(boolean _is_payment) {
		    if (_is_payment == true) {
		    	this.is_payment = true;
		    	getFrame();
		    }
		  }

	private boolean is_payment = false;
	public JPanel content;
	public JFrame frame;
	public JLabel lblElektrik,lblDogalgaz,lblSu,lblTel,lblBakiye;
	public JButton btnElektrik,btnDogalgaz,btnSu,btnTel;
	
	
	
	public JPanel getContent() {
		
		content = new JPanel();
		content.setBackground(Color.white);
	
	

		lblElektrik = new JLabel("Elektrik Faturası : " + Faturalar.elektrik );
		lblElektrik.setAlignmentX(JLabel.CENTER_ALIGNMENT);
	
		lblSu = new JLabel("Su Faturası : " + Faturalar.su + " TL"); 
		lblSu.setAlignmentX(JLabel.CENTER_ALIGNMENT);
	
		lblDogalgaz = new JLabel("Doğalgaz Faturası : " + Faturalar.dogalgaz + " TL");
		lblDogalgaz.setAlignmentX(JLabel.CENTER_ALIGNMENT);

		lblTel = new JLabel("Telekominasyon Faturası : "+Faturalar.tel + " TL");
		lblTel.setAlignmentX(JLabel.CENTER_ALIGNMENT);
		
		btnElektrik = new JButton("Elektriği Öde");
		btnSu = new JButton("Suyu Öde");
		btnDogalgaz = new JButton("Doğalgazı Öde");
		btnTel = new JButton("Telefonu Öde");

		
		if(this.is_payment) {
			DataBase database = new DataBase();
			lblBakiye = new JLabel("Hesap Bakiyesi : " + Controller.database.getBakiye() );
			lblBakiye.setAlignmentX(Component.CENTER_ALIGNMENT);
			
			int result = 0;
			
			 btnElektrik.addActionListener(new ActionListener() {
		            public void actionPerformed(ActionEvent arg0) {	
		            	int result =	Controller.database.getBakiye() - Faturalar.elektrik;
		            	if(result < 0) {
		            		JOptionPane.showMessageDialog(frame, "Bakiyeniz yetersiz !");
		            		return;
		            	}
		            	
		            	Controller.database.setBakiye(result);
		            	Faturalar.elektrik = 0;
		            	System.out.print(result);
		            	lblBakiye.setText("Hesap Bakiyesi : " + Controller.database.getBakiye());
		            	lblElektrik.setText("Elektrik Faturası : " + Faturalar.elektrik);
		            	

		            }
		        });
			 
			 btnSu.addActionListener(new ActionListener() {
		            public void actionPerformed(ActionEvent arg0) {	
		            	
		            	int result =	Controller.database.getBakiye() - Faturalar.su;
		            	if(result < 0) {
		            		JOptionPane.showMessageDialog(frame, "Bakiyeniz yetersiz !");
		            		return;
		            	}
		            	
		            	Faturalar.su = 0;
		            	Controller.database.setBakiye(result);
		            	System.out.print(result);
		            	lblBakiye.setText("Hesap Bakiyesi : " + Controller.database.getBakiye());
		            	lblSu.setText("Su Faturası : " + Faturalar.elektrik);

		            }
		        });
			 
			 btnDogalgaz.addActionListener(new ActionListener() {
		            public void actionPerformed(ActionEvent arg0) {	
		            	int result =	Controller.database.getBakiye() - Faturalar.dogalgaz;
		            	if(result < 0) {
		            		JOptionPane.showMessageDialog(frame, "Bakiyeniz yetersiz !");
		            		return;
		            	}
		            	
		            	Faturalar.dogalgaz = 0;
		            	Controller.database.setBakiye(result);
		            	System.out.print(result);
		            	lblBakiye.setText("Hesap Bakiyesi : " + Controller.database.getBakiye());
		            	lblDogalgaz.setText("Doğalgaz Faturası : " + Faturalar.elektrik);
		            }
		        });
			 
			 btnTel.addActionListener(new ActionListener() {
		            public void actionPerformed(ActionEvent arg0) {	
		            	
		            	int result =	Controller.database.getBakiye() - Faturalar.tel;
		            	if(result < 0) {
		            		JOptionPane.showMessageDialog(frame, "Bakiyeniz yetersiz !");
		            		return;
		            	}
		            	
		            	Faturalar.tel = 0;
		            	Controller.database.setBakiye(result);
		            	System.out.print(result);
		            	lblBakiye.setText("Hesap Bakiyesi : " + Controller.database.getBakiye());
		            	lblTel.setText("Telekominasyon Faturası : " + Faturalar.tel);
		            
		            }
		        });
			
			content.setLayout(new GridLayout(9,1));
			content.add(lblElektrik);
			content.add(btnElektrik);
			content.add(lblSu);
			content.add(btnSu);
			content.add(lblDogalgaz);
			content.add(btnDogalgaz);
			content.add(lblTel);
			content.add(btnTel);
			content.add(lblBakiye);
		}
		else {
			content.setLayout(new GridLayout(4,1));
			content.add(lblElektrik);
			content.add(lblSu);
			content.add(lblDogalgaz);
			content.add(lblTel);
		}
		
       
        return content;
	}
	
	public void getFrame() {
		
		content = getContent();
		
		frame = new JFrame();
    	frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
    	frame.add(content);
    	frame.setSize(400,400);
    	frame.setVisible(true);
	}
}
