

public class MultithreadingUsingThread extends Thread {

	public void run() {
		System.out.println("My thread is in running state.");
	}

	public static void main(String args[]) {
		MultithreadingUsingThread t1 = new MultithreadingUsingThread();
		t1.start();
	}
}