import java.awt.Color;
import javax.swing.JButton;

public class MenuButtons extends JButton {
	
	MenuButtons(String menuName){
		
		this.setText(menuName);
		this.setBackground(Color.black);
		this.setForeground(Color.decode("#2E8B57"));
	}
	
}
