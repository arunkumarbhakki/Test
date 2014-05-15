package com.multi.login;




import static org.junit.Assert.fail;

import java.io.FileInputStream;

import jxl.Sheet;
import jxl.Workbook;

import org.junit.After;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;

public class Login {
  private WebDriver driver;
  private String baseUrl;
  private String Name;

  private StringBuffer verificationErrors = new StringBuffer();

  

  @Test
  public void FFconfig() throws Exception{
	  driver = new FirefoxDriver();
	  System.out.println("Firefox is selected");
	  testUntitled();
  }
  
  @Test
  public void CHconfig() throws Exception{
	  System.setProperty("webdriver.chrome.driver", "//Users/acinfotechinc/Downloads/chromedriver");
	   driver = new ChromeDriver();
	   System.out.println("Google chrome is selected");
	   testUntitled();
  }
  
  public void testUntitled() throws Exception {
	 
	  baseUrl = "http://localhost:8888/IbizappV1/login";
	  driver.get(baseUrl);
	  driver.manage().window().maximize();
	  FileInputStream fi=new FileInputStream("/Users/acinfotechinc/Desktop/untitled folder/Ibizlogin.xls");
		Workbook w=Workbook.getWorkbook(fi);
		Sheet s=w.getSheet(0);
		try{
		for (int i = 1; i < s.getRows(); i++)
		{
			
		//Read data from excel sheet
		String s1 = s.getCell(0,i).getContents();
		String s2 = s.getCell(1,i).getContents();
    driver.findElement(By.id("username")).clear();
    driver.findElement(By.id("username")).sendKeys(s1);
    driver.findElement(By.id("password")).clear();
    driver.findElement(By.id("password")).sendKeys(s2);
    driver.findElement(By.xpath("//input[@value='Sign in']")).click();
    driver.findElement(By.xpath("html/body/div[1]/header/nav/div/ul[2]/li/a")).click();
    Name = driver.findElement(By.cssSelector("div.text-truncate")).getText();
    System.out.println("Name="+Name);
    driver.findElement(By.linkText("Logout")).click();
		
  }
		}
		catch (Exception e){
			System.out.println(e);
		}
		}

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }
}

