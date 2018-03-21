import java.time.LocalDateTime;

/**
 * 
 */

/**
 * @author Z3R0
 *
 */
public class TestThreadRunnable implements Runnable{

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		LocalDateTime ldt = LocalDateTime.now();
		
		System.out.println(ldt + "This is currently running on the main thread, " + "the id is: " + Thread.currentThread().getId());
		
		TestThreadRunnable worker = new TestThreadRunnable();
		Thread thread = new Thread(worker);
		thread.start();
		Thread t2 = new Thread(worker);
		t2.start();
		Thread t3 = new Thread(worker);
		t3.start();
		Thread t4 = new Thread(worker);
		t4.start();
		
		ldt = LocalDateTime.now();
		System.out.println(ldt + ":Main finished running...");
	}
	public void run()
	{
		LocalDateTime ldt = LocalDateTime.now();
		System.out.println("This is currently running on a separate thread, " + "the id is: " + Thread.currentThread().getId());
	}
}
