import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys

class admin_login(unittest.TestCase):

    def setUp(self):
	chrome_options = webdriver.ChromeOptions()
	chrome_options.add_argument('--no-sandbox')
	chrome_options.add_argument('--window-size=1420,1080')
	chrome_options.add_argument('--headless')
	chrome_options.add_argument('--disable-gpu')
	chrome_options.add_argument("--remote-debugging-port=9222")
        self.driver = webdriver.Chrome(chrome_options=chrome_options)

    def test_search_in_python_org(self):
        driver = self.driver
        driver.get("http://192.168.0.42/webapp/login.php")
        self.assertIn("Log", driver.title)
        elem = driver.find_element_by_name("username")
        elem.send_keys("super")
        elem = driver.find_element_by_name("password")
        elem.send_keys("super123")
        elem.send_keys(Keys.RETURN)
        self.assertIn("Welcome", driver.page_source)
        #assert "No results found." not in driver.page_source


    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()
