class IfElseLadder {
   public static void main(String[] args) {   

      //int number = 0;
      int number = Integer.parseInt(args[0]);
      
      System.out.println("This is the number:"+ number);
	 
      if (number > 0) {
         System.out.println("Number is positive.");
         System.out.println("Number is positive 2.");
      }
      else if (number < 0) {
         System.out.println("Number is negative.");
         System.out.println("Number is negative 2.");
      }
      else {
         System.out.println("Number is 0.");
         System.out.println("Number is 0 2.");
      } 
   }
}