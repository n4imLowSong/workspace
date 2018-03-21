interface Modem {
	
	public boolean open();
	public boolean
}

// ----------------------------------------------------------

class MindStickModem implements Modem {
                     public boolean open() {

                            System.out.println("Started a MindStickModem");
			    return true;

                     }

                     public boolean close() {

                             // implementation
                             System.out.println("Closed a MindStickModem");
			     return false;

                     }

                     public int read() {

                             // implementation
                             System.out.println("Reading a MindStickModem way");
			     return 100; 	

                     }

                     public int write() {

                             // implementation
                             System.out.println("Writing a MindStickModem way");
                             return 100;
 
                     }

}

//--------------------------------------------------------------------------
 class HuaweiModem implements Modem {
                     public boolean open() {

                             // implementation
			     System.out.println("Started a HuaweiModem way");
			     return true;	
                             
                     }

                     public boolean close() {

                             // implementation
                             System.out.println("Closed a HuaweiModem way");	
                             return false; 

                     }

                     public int read() {

                             // implementation
                             System.out.println("Reading a HuaweiModem way");
                             return 200;	

                     }

                     public int write() {

                             // implementation
                             System.out.println("Written a HuaweiModem way");	
		             return 200;	

                     }


}

// Testing class for modem 

public class ModemTesting {

	public static void main(String args[]) {

	Modem mindstickmodem = new MindStickModem();
	mindstickmodem.open();
	mindstickmodem.write();
	mindstickmodem.read();
	mindstickmodem.close();
 

	Modem huaweimodem = new HuaweiModem();
	huaweimodem.open();
	huaweimodem.write();
	huaweimodem.read();
	huaweimodem.close();
	
	Modem [] modems = new Modem[4];
	modems [0] = new MindStickModem();
	modems [1] = new HuaweiModem();
	modems [2] = new HuaweiModem();
	modems [0] = new MindStickModem();
	
	for (Modem modem:modems) {
		System.out.println(modem.modemVersion);
		Modem.getMyName();
		modem.open();
		modem.write();
		modem.read();
		modem.close();
		
	}

	}

}  