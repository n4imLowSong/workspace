/**
 * 
 */
import java.util.Calendar;
import java.util.Date;
//import java.time.
/**
 * @author Z3R0
 *
 */
public class UtilTest {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		Date dt = new Date();
		String currentDate = String.valueOf(dt.getDay()); 
		System.out.println("Current Date is:" + currentDate);
		System.out.println("Current Time is:" + dt.getTime());
		
		Calendar cal = Calendar.getInstance();
		
		
		String currentCalDate = cal.get(Calendar.DATE) + "/" + cal.get(Calendar.MONTH) + "/" + cal.get(Calendar.YEAR) +" " + 
		cal.get(Calendar.HOUR) + ":" + cal.get(Calendar.MINUTE) + " " + cal.getTimeZone().getDisplayName();
		
		System.out.println("Current Date is :" + currentCalDate );
	}

}
