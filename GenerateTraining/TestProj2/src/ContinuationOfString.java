/**
 * 
 */

/**
 * @author Z3R0
 *
 */
public class ContinuationOfString {

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		
		String text = "This is my text";
		//text = text.trim();
		String oldtext = args[0];
		String replace = args[1];
		
		System.out.println("Original Text:" + text);
		System.out.println("Replace Text:" + text.trim().replace(oldtext, replace).toUpperCase());
	}

}
