/**
 * 
 */
import java.time.*;
import java.util.Calendar;
import java.util.Date;
//import java.time.
/**
 * @author Z3R0
 *
 */
public class UtilTest2 {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		int year = Integer.parseInt(args[0]);
		int month = Integer.parseInt(args[1]);
		int date = Integer.parseInt(args[2]);
		int hourOfDay = Integer.parseInt(args[3]);
		int minute = Integer.parseInt(args[4]);
		int second = Integer.parseInt(args[5]);

		Calendar cal = Calendar.getInstance();
		cal.set(year, (month-1), date, hourOfDay, minute);
		
		String yourDate = cal.get(Calendar.DATE) + "/" + cal.get(Calendar.MONTH) + "/" + cal.get(Calendar.YEAR) +" " + 
				cal.get(Calendar.HOUR) + ":" + cal.get(Calendar.MINUTE) + " " + cal.getTimeZone().getDisplayName();
		
		System.out.println("Your Date is :" + yourDate);
	}

}
