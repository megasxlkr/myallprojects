
public class Controller {
	
	public static DataBase database;
	public static Faturalar faturalar;
	
	
	public static void Start() {
		database = new DataBase();
		faturalar = new Faturalar();
	}
	
	
}
