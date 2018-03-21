/**
 * 
 */

/**
 * This class test Java Arrays
 * @author Z3R0
 *
 */
public class TestArrays {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		double salaries [] = {100,150,160,170,180};
		
		/*
		for(int i = 0; i < salaries.length; i++) {
			System.out.println("salary of "+i + "is"+ salaries[i]);
		}
		*/
		
		int i=0;
		for (double sal:salaries) {
			System.out.println("Salary of "+i + " is "+ sal);
			i++;
		}
	}
}
