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
        public static Player player;
       

        static void Main(string[] args)
        {
            Console.BackgroundColor = ConsoleColor.DarkRed;
            Console.ForegroundColor = ConsoleColor.Green;

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
            player = new Player();
            
            
            while (loopInvoer != "stop")
            {
                int oldCol = player.col;
                int oldRow = player.row;
                Console.WriteLine("Where do you want to go?");
                loopInvoer = Console.ReadLine();

                switch (loopInvoer)
                {
                    case "go north":
                        player.GoNorth();
                        break;
                    case "go east":
                        player.GoEast();
                        break;
                    case "go south":
                        player.GoSouth();
                        break;
                    case "go west":
                        player.GoWest();
                        break;
                }

                Console.WriteLine($"{player.col}, {player.row}");
                var loc = world1.GetLocation(player.col, player.row);

                switch (loopInvoer)
                {
                    case "look north":
                        player.GoNorth();
                        Console.WriteLine($"You are watching north and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoSouth();
                        break;
                    case "look east":
                        player.GoEast();
                        Console.WriteLine($"You are watching east and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoWest();
                        break;
                    case "look south":
                        player.GoSouth();
                        Console.WriteLine($"You are watching south and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoNorth();
                        break;
                    case "look west":
                        player.GoWest();
                        Console.WriteLine($"You are watching west and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoEast();
                        break;
                    case "look around":
                        player.GoNorth();
                        Console.WriteLine($"You are watching north and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoSouth();
                        player.GoEast();
                        Console.WriteLine($"You are watching east and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoWest();
                        player.GoSouth();
                        Console.WriteLine($"You are watching south and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoNorth();
                        player.GoWest();
                        Console.WriteLine($"You are watching west and seeing {loc.Area} at the coordinates {player.col}, {player.row}");
                        player.GoEast();
                        break;
                }
                if (player.col == 2 && player.row == 7)
                {
                    Console.WriteLine("Here is a boat you need. Type 'pick up' to pick up the boat. Type 'drop' to drop the boat.");
                }

                if (loopInvoer == "show inventory")
                {
                    InventoryList.ShowInventory();
                }

                if (loopInvoer == "pick up" && loc.Area == "Boat")
                {
                    InventoryList.AddItem("Boat");
                    loc.Area = "You already picked up the boat";
                }

                if (loopInvoer == "pick up" && loc.Area == "Key")
                {
                    InventoryList.AddItem("Key");
                    loc.Area = "You already picked up the boat";
                }

                if (loopInvoer == "drop")
                {
                    InventoryList.RemoveItem("Boat");
                }

                if (loc.Area == "Water")
                {
                    Console.BackgroundColor = ConsoleColor.Blue;
                    Console.ForegroundColor = ConsoleColor.Yellow;
                    Console.WriteLine("You can't go further that way, you need a boat to cross the water");
                    player.col = oldCol;
                    player.row = oldRow;
                }

                if (loc.Area == "Mountain")
                {
                    Console.WriteLine("Watch your steps, this Mountain is very dangerous so you can't go further this way!");
                    player.col = oldCol;
                    player.row = oldRow;
                }

                if (loc.Area == "Snow")
                {
                    Console.WriteLine("There is a lot of snow. Keep moving before there will be a lawine");
                }

                if (loc.Area == "Swamp")
                {

                    if (InventoryList.CheckInventory("Boat"))
                    {
                        Console.WriteLine("You found the boat and now you can cross the swamp safely to get to sherk's mansion!");
                    }
                    else
                    {
                        Console.WriteLine("You drowned in the poisonous swamp but you saw a shadow of a person while you drowned in the swamp. You migth want to try and fine yourself tools to get across the swamp.");
                        Console.WriteLine("press 'enter' to respawn");
                        player.col = 9;
                        player.row = 0;
                    }
                }

                if (loc.Area == "Shrek")
                {
                    Console.WriteLine("Congratulations, you have finished this adventure!");

                }
                if (loc.Area == "House")
                {
                    Console.WriteLine("This is a hounted house, there were rumors about witches living in the house.");

                }
                Console.WriteLine($"You are now at the coordinates {player.col}, {player.row}.");
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
                col++;

                if (i % columns == 0)
                {
                    row++;
                    col = 0;
                }

                var line = lines[i];
                var parts = line.Split(',');
                var name = parts[0];
                var type = parts[1];
                var weather = parts[2];
                var location = new Location(name, type, weather);
                Grid[row, col] = location;
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
            else Console.WriteLine("You can't go that way!");
        }
        public void GoEast()
        {
            if (row < 9)
            {
                row = row + 1;
            }
            else Console.WriteLine("You can't go that way!");
        }
        public void GoSouth()
        {
            if (col < 9)
            {
                col = col + 1;
            }
            else Console.WriteLine("You can't go that way!");
        }
        public void GoWest()
        {
            if (row > 0)
            {
                row = row - 1;
            }
            else Console.WriteLine("You can't go that way!");
        }
    }
}