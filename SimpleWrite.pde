import processing.serial.*;
 
// The serial port:
Serial myPort;
String dataReading = "";
String [] dataOutput = {};
 
void setup() {
size(500,500);
 
// Open the port you are using at the rate you want:
myPort = new Serial(this, Serial.list()[1], 9600); 
//in my case,the Serial port the Arduino is connected to is 9th on the serial list, hence the [8]
//to get access to the serial list you can use >> println(Serial.list());
myPort.bufferUntil('\n');
 
}
 
void draw() {
 
}
 
void serialEvent(Serial myPort) {
 dataReading = myPort.readString();
 if(dataReading!=null){
    dataOutput = append(dataOutput, dataReading);
    saveData(); 
  } 
}

void saveData() {
  println("saving to txt file...");
  saveStrings("/Users/RobCardy/Programming/tester/test.txt", dataOutput);
}