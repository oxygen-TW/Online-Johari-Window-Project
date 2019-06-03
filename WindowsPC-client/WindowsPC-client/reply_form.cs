using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;
using Newtonsoft.Json;

namespace WindowsPC_client
{
    public partial class reply_form : Form
    {
        public reply_form()
        {
            InitializeComponent();
        }
        List<string> TraitList = new List<string>();

        private void traitButton_Click(object sender, EventArgs e)
        {
            Button Thisbtn = (Button)sender;
            Console.WriteLine(Thisbtn.Text);

            if (Thisbtn.Tag == "false")
            {
                Thisbtn.Tag = "true";
                Thisbtn.BackColor = SystemColors.AppWorkspace;
                TraitList.Add(Thisbtn.Text);
            }
            else if (Thisbtn.Tag == "true")
            {
                Thisbtn.Tag = "false";
                Thisbtn.BackColor = DefaultBackColor;
                TraitList.Remove(Thisbtn.Text);
            }
            else
            {
                MessageBox.Show("Error", "System error", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        private void submitBtn_Click(object sender, EventArgs e)
        {
            HTTPController HC = new HTTPController();

            string jsonData = JsonConvert.SerializeObject(TraitList);
            Console.WriteLine(jsonData);
            string resultJson = HC.UserReply(token_inputbox.Text, jsonData);

            dynamic result = JsonConvert.DeserializeObject(resultJson);
            if (result.success != "true")
            {
                MessageBox.Show("Error", result, MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            else
            {
                MessageBox.Show((string)result.token, "ok", MessageBoxButtons.OK, MessageBoxIcon.Information);
                Console.WriteLine((string)result.token);
            }
        }

        private void button63_Click(object sender, EventArgs e)
        {
            new_form nf = new new_form();//產生Form2的物件，才可以使用它所提供的Method

            this.Visible = false;//將Form1隱藏。由於在Form1的程式碼內使用this，所以this為Form1的物件本身
            nf.Visible = true;//顯示第二個視窗
        }
    }
}
