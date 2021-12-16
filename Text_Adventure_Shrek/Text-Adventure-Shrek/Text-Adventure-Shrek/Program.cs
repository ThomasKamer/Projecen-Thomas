using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Text_Adventure_Shrek
{
    class Program
    {
        public static World world1;

        static void Main(string[] args)
        {
            Console.BackgroundColor = ConsoleColor.Magenta;
            Console.ForegroundColor = ConsoleColor.Yellow;

            var player1 = new Player();
            var game1 = new Game();

            world1 = new World();
            world1.MakeGrid();
            gameTitel();
            gameIntro();
            StartGame();
        }
        public static void gameTitel()
        {
            Console.WriteLine("Welcome to our Shrek Text Adventure game.");
            Console.WriteLine("Press 'Enter' to start the game.");
            Console.ReadLine();
            Console.Clear();
        }
        public static void gameIntro()
        {
            Console.WriteLine("You suddenly woke up in a wide and peaceful area.");
            Console.WriteLine("Shrek killed your dog and you go search for Shrek to take revenge on him.");
            Console.WriteLine("At first you need to find tools to get trough the mysterious and poisonous swamp and to take revenge on Shrek.");
            Console.WriteLine("The tools you need lay all across the area where you are in.");
        }
        public static void StartGame()
        {
            string loopInvoer = "";
            var player = new Player();

            while (loopInvoer != "stop")
            {
                int oldCol = player.col;
                int oldRow = player.row;
                Console.WriteLine("Where do you want to go?");
                loopInvoer = Console.ReadLine();


                if (loopInvoer == "go north")
                {
                    player.GoNorth();
                }
                if (loopInvoer == "go south")
                {
                    player.GoSouth();
                }
                if (loopInvoer == "go east")
                {
                    player.GoEast();
                }
                if (loopInvoer == "go west")
                {
                    player.GoWest();

                }

                if (loopInvoer == "look north")
                {
                    player.LookNorth();
                }

                if (loopInvoer == "look east")
                {
                    player.LookEast();
                }

                if (loopInvoer == "look south")
                {
                    player.LookSouth();
                }

                if (loopInvoer == "look west")
                {
                    player.LookWest();
                }

                Console.WriteLine($"{player.col}, {player.row}");
                var loc = world1.GetLocation(player.col, player.row);

                

                if (loc.Area == "Water")
                {
                    Console.WriteLine("You can't go further that way, you need a boat to cross the water");
                    player.col = oldCol;
                    player.row = oldRow;
                }

                if (loc.Area == "Mountain")
                {
                    Console.WriteLine("Watch your steps, this Mountain is very dangerous but you can continue!");
                }

                if (loc.Area == "Snow")
                {
                    Console.WriteLine("You died by a lawine, Press 'Enter' to respawn");
                    player.col = 9;
                    player.row = 0;
                }

                if (loc.Area == "Swamp")
                {
                    Console.WriteLine("You drowned in the poisonous swamp but you saw a shadow of a person while you drowned in the swamp. You migth want to try and fine yourself tools to get across the swamp.");
                    Console.WriteLine("press 'enter' to respawn");
                    player.col = oldCol;
                    player.row = oldRow;
                }

                if (loc.Area == "Shrek")
                {
                    Console.WriteLine("congratulations, you have finished this adventure!");
                    
                }

                if (loc.Area == "House")
                {
                    Console.WriteLine("This is a hounted house, there were rumors about witches living in the house.");

                }

                Console.WriteLine(loc.Describe());
            }
        }
    }
    class World
    {
        int rows = 10;
        int columns = 10;
        int row = 0;
        int col = 0;
        public Location[,] Grid;

        public void MakeGrid()
        {
            Grid = new Location[rows, columns];

            string[] lines;
            try
            {
                lines = File.ReadAllLines(@"C:\CSharp\Text_Adventure_Shrek\Text Adventure\text-adventure.txt");
            }
            catch (Exception e)
            {
                Console.WriteLine(e.Message);
                return;
            }

             for (var i = 1; i < lines.Length; i++)
             {
                var line = lines[i];
                var parts = line.Split(',');
                var name = parts[0];
                var type = parts[1];
                var weather = parts[2];
                var location = new Location(name, type, weather);
                Grid[row, col] = location;

                col++;

                if (i % columns == 0)
                {
                    row++;
                    col = 0;
                }
             }
        }
        public Location GetLocation(int row, int col)
        {
            return Grid[row, col];

        }
    }
    class Player
    {   
        public int col = 9;
        public int row = 0;
        public void GoNorth()
        {
            if (col > 0)
            {
                col = col - 1;
            }
            else Console.WriteLine("you can't go that way");
        }
        public void GoEast()
        {
            if (row < 9)
            {
                row = row + 1;
            }
            else Console.WriteLine("you can't go that way");
        }
        public void GoSouth()
        {
            if (col < 9)
            {

                col = col + 1;
            }
            else Console.WriteLine("you can't go that way");
        }
        public void GoWest()
        {
            if (row > 0)
            {
                row = row - 1;
            }
            else Console.WriteLine("you can't go that way");
        }

        public void LookNorth()
        {
            col = col - 1;
            Console.WriteLine($"You look and see {col},{row}");
            col = col + 1;
        }

        public void LookEast()
        {
            row = row + 1;
            Console.WriteLine($"You look and see {col},{row}");
            row = row - 1;
        }

        public void LookSouth()
        {
            col = col + 1;
            Console.WriteLine($"You look and see {col},{row}");
            col = col - 1;
        }

        public void LookWest()
        {
            row = row - 1;
            Console.WriteLine($"You look and see {col},{row}");
            row = row + 1;
        }
    }
}