/**
 * 
 */

/**
 * @author Z3R0
 *
 */
public class TestingExceptions {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		try {
			String name = args[0];
			System.out.println("Your name is :" + name);
			
			if(!(name.startsWith("M"))) {
				throw new Exception("Name should start with M");
			}}
			
		catch (ArrayIndexoutOfBoundsException ae) {
			System.out.println("Please provide your name as Command line parameter." + "ex: java TestingExceptions <Yourname> ");
		}
	}	catch (Exception ex) {
			System.out.println(ex.getMessage);
	}
			System.out.println("I am done..."); 
}
}
