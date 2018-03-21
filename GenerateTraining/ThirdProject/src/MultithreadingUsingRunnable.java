
public class MultithreadingUsingRunnable implements Runnable {

	@Override
	public void run() {
		System.out.println("My thread is in running state.");
	}

	public static void main(String args[]) {
		MultithreadingUsingRunnable t1 = new MultithreadingUsingRunnable();
		Thread threadobj = new Thread(t1);
		threadobj.start();
	}
}