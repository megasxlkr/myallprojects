public class DataBase {
	
	private int customerNumber = 1;
	private String password = "123";
	private int bakiye = 500;
	private int guncelpara = 0;
	
	public int getCustomerNumber() {
		return this.customerNumber;
	}
	
	public String getPassword() {
		return this.password;
	}
	
	public int getBakiye() {
		return this.bakiye;
	}
	public int guncelbakiye(){
		return this.guncelpara;
	}
	
	public void setBakiye(int _bakiye) {
		this.bakiye = _bakiye;
	}
}
