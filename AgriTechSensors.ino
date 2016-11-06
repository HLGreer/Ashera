int lightPin = A0;  //define a pin for Photo resistor
int tempPin = A1;
String light;
float tempC;
float humidity;
int nitrate;
int phosphorus;
int potassium; 
float pH;
long phoneNumber = 9058097743;
String field = "Hannah's field";
void setup() {
  Serial.begin(9600);  //Begin serial communcation
}

void loop() {
  Serial.println(phoneNumber);
  Serial.println(field);
  
  //Serial.println(lightSensorReading);
 
  int tempSensorReading = analogRead(tempPin);
  tempC = ((float)tempSensorReading - 500)/10;
  //Serial.print(tempSensorReading); Serial.println(" Mvolts"); 
  Serial.println(tempC);// Serial.println(" degrees C");

  // Randomly Generating Data -- Replace with Real Sensors & Data
  humidity = random(0.65,0.9); // in decimal representation
  Serial.println(humidity);
  nitrate = random(0,8); // ppm
  Serial.println(nitrate);
  phosphorus = random(10, 60); // ppm
  Serial.println(phosphorus);
  potassium = random(50,200);
  Serial.println(potassium);
  pH = random(5.5,10.0);

  
  int lightSensorReading = analogRead(lightPin); 
  if (lightSensorReading < 50) {
    light = "Dark";
  } else if (lightSensorReading < 300) {
    light = "Dim";
  } else if (lightSensorReading < 600) {
    light = "Light";
  } else if (lightSensorReading < 800) {
    light = "Bright";
  } else {
    light = "Very Bright";
  }
  Serial.println(light);
  
 
  /*resistance = (float)(1023 - tempSensorReading)*10000/tempSensorReading; // resistance of the sensor
  tempC = 1/(log(resistance/10000)/ */
  
  delay(1000);
}
