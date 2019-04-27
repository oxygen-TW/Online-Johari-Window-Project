using System;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace WindowsPC_client
{
    class HTTPController
    {
        private string APIEndpoint_NEW = "http://127.0.0.1/ap/new.php";
        private string APIEndpoint_ADD = "http://127.0.0.1/ap/add.php";
        private string APIEndpoint_READ = "http://127.0.0.1/ap/result.php";

        public string NewUser(string nickname,string trait)
        {

            System.Net.HttpWebRequest request = (HttpWebRequest)WebRequest.Create(APIEndpoint_NEW);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";

            //必須透過ParseQueryString()來建立NameValueCollection物件，之後.ToString()才能轉換成queryString
            NameValueCollection postParams = System.Web.HttpUtility.ParseQueryString(string.Empty);
            postParams.Add("nickname", nickname);
            postParams.Add("trait", trait);

            //Console.WriteLine(postParams.ToString());// 將取得"version=1.0&action=preserveCodeCheck&pCode=pCode&TxID=guid&appId=appId", key和value會自動UrlEncode
            //要發送的字串轉為byte[] 
            byte[] byteArray = Encoding.UTF8.GetBytes(postParams.ToString());
            using (Stream reqStream = request.GetRequestStream())
            {
                reqStream.Write(byteArray, 0, byteArray.Length);
            }//end using

            //API回傳的字串
            string responseStr = "";
            //發出Request
            using (System.Net.WebResponse response = request.GetResponse())
            {
                using (System.IO.StreamReader sr = new System.IO.StreamReader(response.GetResponseStream(), Encoding.UTF8))
                {
                    responseStr = sr.ReadToEnd();
                }//end using  
            }

            return responseStr;//印出回傳字串
        }

        public string UserReply(string token, string trait)
        {

            System.Net.HttpWebRequest request = (HttpWebRequest)WebRequest.Create(APIEndpoint_ADD);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";

            //必須透過ParseQueryString()來建立NameValueCollection物件，之後.ToString()才能轉換成queryString
            NameValueCollection postParams = System.Web.HttpUtility.ParseQueryString(string.Empty);
            postParams.Add("token", token);
            postParams.Add("trait", trait);

            //Console.WriteLine(postParams.ToString());// 將取得"version=1.0&action=preserveCodeCheck&pCode=pCode&TxID=guid&appId=appId", key和value會自動UrlEncode
            //要發送的字串轉為byte[] 
            byte[] byteArray = Encoding.UTF8.GetBytes(postParams.ToString());
            using (Stream reqStream = request.GetRequestStream())
            {
                reqStream.Write(byteArray, 0, byteArray.Length);
            }//end using

            //API回傳的字串
            string responseStr = "";
            //發出Request
            using (System.Net.WebResponse response = request.GetResponse())
            {
                using (System.IO.StreamReader sr = new System.IO.StreamReader(response.GetResponseStream(), Encoding.UTF8))
                {
                    responseStr = sr.ReadToEnd();
                }//end using  
            }

            return responseStr;//印出回傳字串
        }
    }
    }

