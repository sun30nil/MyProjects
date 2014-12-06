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
using System.Windows.Threading;

namespace PhoneApp7
{
    public partial class MainPage : PhoneApplicationPage
    {
        int op;
        int score = 0;
        int count = -1;
        String[] oper = new String[] { "+", "-", "*" };
        Random myRandom = new Random();
        DispatcherTimer newTimer;
        // Constructor
        public MainPage()
        {
            InitializeComponent();

            // Sample code to localize the ApplicationBar
            //BuildLocalizedApplicationBar();
        }

        void OnTimerTick(Object sender, EventArgs args)
        {
            count++;
            textBlock5.Text = Convert.ToString(15 - count);
            if (count == 15)
            {
                count = -1;
                int a = int.Parse(textBlock1.Text);
                int b = int.Parse(textBlock2.Text);
                int c;
                // MessageBox.Show("hi..");
                //int c = int.Parse(textBox1.Text);

                if (op == 0 && textBox1.Text != "")
                {
                    c = int.Parse(textBox1.Text);
                    if (a + b == c)
                    {
                        // MessageBox.Show("add");
                        op = myRandom.Next(0, 2);
                        textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                        textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                        textBlock3.Text = oper[op];
                        textBox1.Text = "";
                        score += 1;
                        scoreBlock.Text = Convert.ToString(score);
                        newTimer.Stop();
                        check();

                        //MessageBox.Show("Good");
                    }
                    else
                    {
                        MessageBox.Show("Your Streak Ends : " + score);
                        score = 0;
                        scoreBlock.Text = Convert.ToString(score);
                        count = -1;

                        newTimer.Stop();
                    }
                }
                else if (op == 1 && textBox1.Text != "")
                {
                    c = int.Parse(textBox1.Text);
                    if (a - b == c)
                    {
                        //MessageBox.Show("mul");
                        op = myRandom.Next(0, 2);
                        textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                        textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                        textBlock3.Text = oper[op];
                        textBox1.Text = "";
                        score += 1;
                        scoreBlock.Text = Convert.ToString(score);
                        newTimer.Stop();
                        check();
                        //  MessageBox.Show("Good");
                    }
                    else
                    {
                        MessageBox.Show("Your Streak Ends : " + score);
                        score = 0;
                        scoreBlock.Text = Convert.ToString(score);
                        count = -1;
                        newTimer.Stop();
                    }
                }
                else if (op == 2 && textBox1.Text != "")
                {
                    c = int.Parse(textBox1.Text);
                    if (a * b == c)
                    {
                        // MessageBox.Show("sub");
                        op = myRandom.Next(0, 2);
                        textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                        textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                        textBlock3.Text = oper[op];
                        textBox1.Text = "";
                        score += 1;
                        scoreBlock.Text = Convert.ToString(score);
                        newTimer.Stop();
                        check();

                        // MessageBox.Show("Good");
                    }
                    else
                    {
                        MessageBox.Show("Your Streak Ends : " + score);
                        score = 0;
                        scoreBlock.Text = Convert.ToString(score);
                        count = -1;
                        newTimer.Stop();
                    }
                }
                else
                {
                    MessageBox.Show("Your Streak Ends ----: " + score);
                    score = 0;
                    scoreBlock.Text = Convert.ToString(score);
                    textBox1.Text = "";
                    count = -1;
                    newTimer.Stop();
                }


            }

            // text box property is set to current system date.
            // ToString() converts the datetime value into text
            //txtClock.Text = DateTime.Now.ToString();
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

        private void ChangeMediaVolume(object sender, RoutedPropertyChangedEventArgs<double> args)
        {
            media.Volume = (double)volumeSlider.Value;
        }

        private void textBox1_TextChanged(object sender, TextChangedEventArgs e)
        {

        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            count = -1;
            int a = int.Parse(textBlock1.Text);
            int b = int.Parse(textBlock2.Text);
            int c;
            // MessageBox.Show("hi..");
            //int c = int.Parse(textBox1.Text);

            if (op == 0 && textBox1.Text != "")
            {
                c = int.Parse(textBox1.Text);
                if (a + b == c)
                {
                    // MessageBox.Show("add");
                    op = myRandom.Next(0, 2);
                    textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock3.Text = oper[op];
                    textBox1.Text = "";
                    score += 1;
                    scoreBlock.Text = Convert.ToString(score);
                    newTimer.Stop();
                    check();

                    //MessageBox.Show("Good");
                }
                else
                {
                    MessageBox.Show("Your Streak Ends : " + score);
                    score = 0;
                    scoreBlock.Text = Convert.ToString(score);
                    count = -1;

                    newTimer.Stop();
                }
            }
            else if (op == 1 && textBox1.Text != "")
            {
                c = int.Parse(textBox1.Text);
                if (a - b == c)
                {
                    //MessageBox.Show("mul");
                    op = myRandom.Next(0, 2);
                    textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock3.Text = oper[op];
                    textBox1.Text = "";
                    score += 1;
                    scoreBlock.Text = Convert.ToString(score);
                    newTimer.Stop();
                    check();
                    //  MessageBox.Show("Good");
                }
                else
                {
                    MessageBox.Show("Your Streak Ends : " + score);
                    score = 0;
                    scoreBlock.Text = Convert.ToString(score);
                    count = -1;
                    newTimer.Stop();
                }
            }
            else if (op == 2 && textBox1.Text != "")
            {
                c = int.Parse(textBox1.Text);
                if (a * b == c)
                {
                    // MessageBox.Show("sub");
                    op = myRandom.Next(0, 2);
                    textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
                    textBlock3.Text = oper[op];
                    textBox1.Text = "";
                    score += 1;
                    scoreBlock.Text = Convert.ToString(score);
                    newTimer.Stop();
                    check();

                    // MessageBox.Show("Good");
                }
                else
                {
                    MessageBox.Show("Your Streak Ends : " + score);
                    score = 0;
                    scoreBlock.Text = Convert.ToString(score);
                    count = -1;
                    newTimer.Stop();
                }
            }
            else
            {
                MessageBox.Show("Your Streak Ends ----: " + score);
                score = 0;
                scoreBlock.Text = Convert.ToString(score);
                textBox1.Text = "";
                count = -1;
                newTimer.Stop();
            }

        }

        /* private void Slider_ValueChanged_1(object sender, RoutedPropertyChangedEventArgs<double> e)
         {
             int newValue = (int)e.NewValue;

             //Set the new position
             SliderAmount.Value = newValue;
             media.Volume = newValue/10;
         } */

        private void Button_Click_1(object sender, RoutedEventArgs e)
        {
            media.Stop();
            Uri k = new Uri("white.mp3", UriKind.Relative);
            media.Source = k;
            media.MediaEnded += new RoutedEventHandler(mediaElement1_MediaEnded);

        }



        private void Button_Click_2(object sender, RoutedEventArgs e)
        {
            media.Stop();
            Uri k = new Uri("brown.mp3", UriKind.Relative);
            media.Source = k;
            media.MediaEnded += new RoutedEventHandler(mediaElement1_MediaEnded);

        }

        private void Button_Click_3(object sender, RoutedEventArgs e)
        {
            media.Stop();
            Uri k = new Uri("pink.mp3", UriKind.Relative);
            media.Source = k;
            media.MediaEnded += new RoutedEventHandler(mediaElement1_MediaEnded);

        }

        void mediaElement1_MediaEnded(object sender, RoutedEventArgs e)
        {
            media.Position = TimeSpan.Zero;
            media.Play();
        }

        private void Button_Click_4(object sender, RoutedEventArgs e)
        {
            newTimer = new DispatcherTimer();
            newTimer.Stop();
            count = -1;
            op = myRandom.Next(0, 3);
            textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
            textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
            textBlock3.Text = oper[op];
            newTimer.Interval = TimeSpan.FromSeconds(1);
            newTimer.Tick += OnTimerTick;

            newTimer.Start();
            textBlock5.Text = "0";

        }

        private void check()
        {
            newTimer = new DispatcherTimer();
            newTimer.Stop();
            count = -1;
            op = myRandom.Next(0, 3);
            textBlock1.Text = Convert.ToString(myRandom.Next(0, 100));
            textBlock2.Text = Convert.ToString(myRandom.Next(0, 100));
            textBlock3.Text = oper[op];
            newTimer.Interval = TimeSpan.FromSeconds(1);
            newTimer.Tick += OnTimerTick;

            newTimer.Start();
            textBlock5.Text = "0";
        }


    }
}