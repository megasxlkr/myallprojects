import java.awt.Color;
import java.awt.Component;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class ContentBakiye {
	public JPanel content;
	public JLabel label;
	public JButton buttonPay;
	
	public JPanel getContent() {
		
		
		content = new JPanel();
		content.setBackground(Color.white);
		content.setLayout(new BoxLayout(content, BoxLayout.Y_AXIS));

		label = new JLabel("Hesap Bakiyesi : " + Controller.database.getBakiye());
		label.setAlignmentX(Component.CENTER_ALIGNMENT);
		content.add(label);
		
		buttonPay = new JButton("Fatura Öde");
		buttonPay.setAlignmentX(Component.CENTER_ALIGNMENT);
		buttonPay.setAlignmentY(Component.BOTTOM_ALIGNMENT);
		
		buttonPay.addActionListener((ActionListener) new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				new ContentFatura(true);
			}
		});
		
		content.add(buttonPay);
		
		

        return content;
	}
}
