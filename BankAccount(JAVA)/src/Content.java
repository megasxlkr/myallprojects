import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;


public class Content extends JFrame{
		 	
		public ContentFatura contentFatura;
		public ContentBakiye contentBakiye;
		public JPanel faturaContent,bakiyeContent;
		public ContentType contentType = ContentType.Bakiye;
	
	public Content() {
			           
		 contentFatura = new ContentFatura(false);
		 contentBakiye = new ContentBakiye();
		
		JPanel sidemenu = new JPanel();
		 faturaContent = contentFatura.getContent();
		 bakiyeContent = contentBakiye.getContent();

		
		sidemenu.setLayout(new GridLayout(3,2));
		
		
		MenuButtons bakiye = new MenuButtons("Bakiye");
		MenuButtons faturahesabi = new MenuButtons("Ödemeler");
		MenuButtons btnExit = new MenuButtons("Çıkış Yap");
		
		sidemenu.add(bakiye);
		sidemenu.add(faturahesabi); 
		sidemenu.add(btnExit);
		
	   
		add(sidemenu,BorderLayout.WEST);
		add(bakiyeContent,BorderLayout.CENTER);
		// add(faturaContent, BorderLayout.CENTER);
		
		bakiyeContent.setVisible(true);
		faturaContent.setVisible(false);
		
		
		bakiye.addActionListener(new ActionListener() {
	            public void actionPerformed(ActionEvent arg0) {	
	            	
	            	if(contentType == ContentType.Bakiye) {
	            		return;
	            	}
	          
	            	contentType = ContentType.Bakiye;
	            	
	            	faturaContent.setVisible(false);
	            	bakiyeContent.setVisible(true);

	            	remove(faturaContent);
	            	contentBakiye = new ContentBakiye();
	            	bakiyeContent = contentBakiye.getContent();
	            	add(bakiyeContent, BorderLayout.CENTER); 
	            	
	            }
	        });
		 
		 faturahesabi.addActionListener(new ActionListener() {
	            public void actionPerformed(ActionEvent arg0) {	
	            
	            	if(contentType == ContentType.Fatura) {
	            		return;
	            	}
	            	
	            	contentType = ContentType.Fatura;
	            	
	            	bakiyeContent.setVisible(false);
	        		faturaContent.setVisible(true);
	        		
	            	remove(bakiyeContent);
	            	contentFatura = new ContentFatura(false);
	            	faturaContent = contentFatura.getContent();
	            	add(faturaContent, BorderLayout.CENTER); 
	            }
	        });
		 
		btnExit.addActionListener((ActionListener) new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				setVisible(false);
				new Opening();
			}
		});
	
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(500, 300);
        setResizable(false);
        setVisible(true);
        setLocationRelativeTo(null);  
        setBackground(Color.green);
        getContentPane().setBackground(Color.decode("#038253"));  
	}
}