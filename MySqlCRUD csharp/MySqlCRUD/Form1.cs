using System;
using System.Data;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace MySqlCRUD
{
    public partial class Form1 : Form
    {

        string connectionString = @"server=localhost;userid=root;database=bookdb";
        int bookID = 0;
        public Form1()
        {
            InitializeComponent();
        }

        private void btnSave_Click(object sender, EventArgs e)
        {

            using (MySqlConnection mySqlConnection = new MySqlConnection(connectionString))
            {
                //Open connection db
                mySqlConnection.Open();

                MySqlCommand mySqlCommand = new MySqlCommand("BookAddOrEdit",mySqlConnection);
                mySqlCommand.CommandType = CommandType.StoredProcedure;
                mySqlCommand.Parameters.AddWithValue("_BookID",bookID);
                mySqlCommand.Parameters.AddWithValue("_BookName", txtBookName.Text.Trim());
                mySqlCommand.Parameters.AddWithValue("_Author", txtAuthor.Text.Trim());
                mySqlCommand.Parameters.AddWithValue("_Description", txtDescription.Text.Trim());
                mySqlCommand.ExecuteNonQuery();

                MessageBox.Show("!اطلاعات با موفقیت ثبت شد ");
                clear();
                GridFill();
               
            }
            
        }
        void GridFill()
        {
            using (MySqlConnection mySqlConnection = new MySqlConnection(connectionString))
            {
                
                mySqlConnection.Open();
                MySqlDataAdapter mySqlDataAdapter = new MySqlDataAdapter("BookViewAll",mySqlConnection);
                mySqlDataAdapter.SelectCommand.CommandType = CommandType.StoredProcedure;
                DataTable dtbBook = new DataTable();
                mySqlDataAdapter.Fill(dtbBook);
                dgvBook.DataSource = dtbBook;
                dgvBook.Columns[0].Visible = false;

            }
        }

        void clear()
        {
            txtBookName.Text = txtAuthor.Text = txtDescription.Text = "";
            bookID = 0;
            btnSave.Text = "Save";
            btnDelete.Enabled = false;
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            clear();
            GridFill();
        }

        private void dgvBook_DoubleClick(object sender, EventArgs e)
        {
            if (dgvBook.CurrentRow.Index != -1)
            {
                txtBookName.Text = dgvBook.CurrentRow.Cells[1].Value.ToString();
                txtAuthor.Text = dgvBook.CurrentRow.Cells[2].Value.ToString();
                txtDescription.Text = dgvBook.CurrentRow.Cells[3].Value.ToString();
                bookID = Convert.ToInt32(dgvBook.CurrentRow.Cells[0].Value.ToString());
                btnSave.Text = "Update";
                btnDelete.Enabled = Enabled;
            }

        }

        private void btnSearch_Click(object sender, EventArgs e)
        {
            using (MySqlConnection mySqlConnection = new MySqlConnection(connectionString))
            {

                mySqlConnection.Open();
                MySqlDataAdapter mySqlDataAdapter = new MySqlDataAdapter("BookSearchByValue", mySqlConnection);
                mySqlDataAdapter.SelectCommand.CommandType = CommandType.StoredProcedure;
                mySqlDataAdapter.SelectCommand.Parameters.AddWithValue("_SearchValue",txtSearch.Text);
                DataTable dtbBook = new DataTable();
                mySqlDataAdapter.Fill(dtbBook);
                dgvBook.DataSource = dtbBook;
                dgvBook.Columns[0].Visible = false;

            }
        }

        private void btnCancel_Click(object sender, EventArgs e)
        {
            clear();
        }

        private void btnDelete_Click(object sender, EventArgs e)
        {
            using (MySqlConnection mySqlConnection = new MySqlConnection(connectionString))
            {
                //Open connection db
                mySqlConnection.Open();

                MySqlCommand mySqlCommand = new MySqlCommand("BookDeleteById", mySqlConnection);
                mySqlCommand.CommandType = CommandType.StoredProcedure;
                mySqlCommand.Parameters.AddWithValue("_BookID", bookID);
                mySqlCommand.ExecuteNonQuery();

                MessageBox.Show("!اطلاعات موفقیت حذف شد ");
                clear();
                GridFill();

            }

        }

    }
}
