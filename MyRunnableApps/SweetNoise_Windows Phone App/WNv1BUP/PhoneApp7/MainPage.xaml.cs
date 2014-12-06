using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Navigation;
using Microsoft.Phone.Controls;
using Microsoft.Phone.Shell;
using PhoneApp7.Resources;

namespace PhoneApp7
{
    public partial class MainPage : PhoneApplicationPage
    {
        int op;
        String[] oper = new String[] { "+", "-", "*" };
        Random myRandom = new Random();
        // Constructor
        public MainPage()
        {
            InitializeComponent();
            op = myRandom.Next(0, 2);
            textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
            textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
            textBlock3.Text = oper[op];

           
            


            // Sample code to localize the ApplicationBar
            //BuildLocalizedApplicationBar();
        }

        // Sample code for building a localized ApplicationBar
        //private void BuildLocalizedApplicationBar()
        //{
        //    // Set the page's ApplicationBar to a new instance of ApplicationBar.
        //    ApplicationBar = new ApplicationBar();

        //    // Create a new button and set the text value to the localized string from AppResources.
        //    ApplicationBarIconButton appBarButton = new ApplicationBarIconButton(new Uri("/Assets/AppBar/appbar.add.rest.png", UriKind.Relative));
        //    appBarButton.Text = AppResources.AppBarButtonText;
        //    ApplicationBar.Buttons.Add(appBarButton);

        //    // Create a new menu item with the localized string from AppResources.
        //    ApplicationBarMenuItem appBarMenuItem = new ApplicationBarMenuItem(AppResources.AppBarMenuItemText);
        //    ApplicationBar.MenuItems.Add(appBarMenuItem);
        //}
        private void StopMedia(object sender, RoutedEventArgs e)
        {
            media.Stop();
        }
        private void PauseMedia(object sender, RoutedEventArgs e)
        {
            media.Pause();
        }
        private void PlayMedia(object sender, RoutedEventArgs e)
        {
            media.Play();
        }

        private void Slider_ValueChanged(object sender, RoutedPropertyChangedEventArgs<double> e)
        {
            media.Volume = e.NewValue;
        }

        private void textBox1_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            int a = int.Parse(textBlock1.Text);
            int b = int.Parse(textBlock2.Text);

            int c = int.Parse(textBox1.Text);

            if(op == 0){
                if (a + b == c)
                {
                    op = myRandom.Next(0, 2);
                    textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock3.Text = oper[op];
                    textBox1.Text = "";
                    MessageBox.Show("Good");
                }
                else
                {
                    MessageBox.Show("Try Again");
                }
            }
            else if (op == 1)
            {
                if (a - b == c)
                {
                    op = myRandom.Next(0, 2);
                    textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock3.Text = oper[op];
                    textBox1.Text = "";
                    MessageBox.Show("Good");
                }
                else
                {
                    MessageBox.Show("Try Again");
                }
            }
            else if (op == 2)
            {
                if (a * b == c)
                {
                    op = myRandom.Next(0, 2);
                    textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock3.Text = oper[op];
                    textBox1.Text = "";
                    MessageBox.Show("Good");
                }
                else
                {
                    MessageBox.Show("Try Again");
                }
            }
            
        }

        private void Slider_ValueChanged_1(object sender, RoutedPropertyChangedEventArgs<double> e)
        {
            int newValue = (int)e.NewValue;

            //Set the new position
            SliderAmount.Value = newValue;
            media.Volume = newValue/10;
        }

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            media.Stop();
            Uri k = new Uri("not.mp3", UriKind.Relative);
            media.Source = k;
        }

       

      
    }
}