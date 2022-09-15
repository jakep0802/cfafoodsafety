<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Ecosure Checklist</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body { font: 14px sans-serif; background-color: honeydew; }
            .card-padding { padding-left: 25% !important; padding-right: 25% !important; padding-top: 30px !important; }
            .card { margin-top: 30px !important; }
            .card-body {margin-left: 10px !important; margin-right: 10px !important; }
            .row-margin { margin: 15px !important; }
            .navbar-btn { display: flex; justify-content: right; }
            .form-control { display: initial !important; }
            .submit-button { margin: 1em !important; }
            .row-response { display: block; }
            .tabbed-checklist { padding-left: 30px; }
            .tabbed-checklist-label { font-style: italic; }
            .date-label-counter { width: 40px; margin: 1px; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div>
                <a class="navbar-brand" href="/home.php">
                    <img src="/logo.svg" height="35" alt="" class="d-inline-block"/>
                </a>
                <a class="navbar-brand" href="/home.php">Ecosure Checklist</a>
            </div>
           
            <form action="/home.php">
                <input type="submit" class="btn btn-primary btn-small" value="Go Back"/> 
            </form>
        </nav>
        <div class="wrapper card-padding">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Checklist Information</h4>
                <hr>
                <p>The Ecosure checklist must be completed @ 6:30AM and 1:00PM.</p>
                <hr>
                <p>When completing the checklist @ 6:30AM, change <b>all</b> stickers that expire before 1:00PM.</p>
                <p>When completing the checklist @ 1:00PM, change <b>all</b> stickers that expire before the end of the day.</p>
                <hr>
                <p>If you find an issue whilst completing the checklist, it is your responsibility to ensure each hazard is taken care of <b>immediately</b>.</p>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="card walkin">
                    <div class="card-header">
                        <b>Walk-In Cooler</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Temperature:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox" class="tabbed-checklist"/>&nbsp;Check walk-in cooler temperature (inside and outside). Write temps next to thermometer.<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Proper date label stickers on appropriate product (if an item is not on a tray, it must be individually stickered):</label>
                            <div class="tabbed-checklist">
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Thawing Mac & Cheese (must be on tracking cardboard)<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Prepped Mac & Cheese<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Pans (and/or Buckets) of Chopped Romaine<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Buckets of Green Leaf<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Sliced Tomatoes<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Sliced Chicken<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Cool-down Chicken<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Cobb Bases<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Markets<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Southwests<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Sides<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Wraps<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Fruit Cups (SM, MD, & LG)<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Parfaits<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Kale Crunch<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Diced Apples<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Diced Strawberries<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Sliced Eggs<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Bacon Crumbles<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Corn & Beans<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Corn<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Open Yogurt Container<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Teas<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Lemonades<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Bags of soup<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Cool-down chicken transferred from pan to a bucket with a lid and a date label sticker<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Clean, dry floors with <b>no product stored on the floor</b><br>
                                <input type="checkbox"/>&nbsp;Lids/Wrap on all opened product<br>
                                <input type="checkbox"/>&nbsp;Employee food shelf with employee items only<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card prep">
                    <div class="card-header">
                        <b>Prep Isle</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Temperature:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox" class="tabbed-checklist"/>&nbsp;Check reach-in cooler temperature (inside and outside). Write temps on fridge.<br>
                                <input type="checkbox"/>&nbsp;Check dishwasher temperature (use "hockey puck")<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Proper date label stickers on appropriate product (if an item is not on a tray, it must be individually stickered):</label>
                            <div class="tabbed-checklist">
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Spring Mix<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Cabbage<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Grape Tomatoes<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Flour (biscuit table)<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Cleaning & Sanitation:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Dishwasher detergent, dry-aid, and produce wash <b>connected and not empty</b><br>
                                <input type="checkbox"/>&nbsp;Dish soap (purple) and sanitizer (red) <b>connected and not empty</b> (no chemicals above sinks)<br>
                                <input type="checkbox"/>&nbsp;Thermometers and sanitizer wipes in station<br>
                                <input type="checkbox"/>&nbsp;Check dish quality (utensils, buckets, pans, etc...)<br>
                                <input type="checkbox"/>&nbsp;Check <b>all</b> blades (tomato and chicken slicer)<br>
                                <input type="checkbox"/>&nbsp;No wet stacking<br>
                                <input type="checkbox"/>&nbsp;Test strips present for dish sinks and produce sinks (not expired)<br>
                                <input type="checkbox"/>&nbsp;Check ice machine (user a coffee filter to wipe all chutes (inside and out) and front metal piece)<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Proper uniform (hair nets, gloves, name tags, shirts, pants, jewlery, nails)<br>
                                <input type="checkbox"/>&nbsp;Ensure there is only bottled water stored under the prep table<br>
                                <input type="checkbox"/>&nbsp;Clean, dry floors<br>
                                <input type="checkbox"/>&nbsp;No food above load lines (top of prep table)<br>
                                <input type="checkbox"/>&nbsp;Check handwashing sink (no food in the bottom of sink)<br>
                                <input type="checkbox"/>&nbsp;No employee food in reach-in coolers<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card nuggets">
                    <div class="card-header">
                        <b>Minis/Nuggets</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Temperature:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox" class="tabbed-checklist"/>&nbsp;Check reach-in cooler temperature (inside and outside). Write temps on fridge.<br>
                                <input type="checkbox"/>&nbsp;AHA timers active and accurate (check for 90-second temping)<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Proper date label stickers on appropriate product (if an item is not on a tray, it must be individually stickered):</label>
                            <div class="tabbed-checklist">
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Boxes of Mini Bread<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Cobb Bases<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Market Bases<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Southwest Bases<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Shredded Cheese<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Open Cartons of Egg<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Cookies & Brownies (trays & containers)<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Thawing Multigrain<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;English Muffins<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Cleaning & Sanitation:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Thermometers and sanitizer wipes in station<br>
                                <input type="checkbox"/>&nbsp;No chemicals at station<br>
                                <input type="checkbox"/>&nbsp;Utensils with proper colors: 5:30-10:30, Blue; 10:30-2:00, Green; 2:00-6:00, Black; 6:00-9:30/10:30, White<br>
                                <input type="checkbox"/>&nbsp;No dirty towels sitting on counters<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Proper uniform (hair nets, gloves, name tags, shirts, pants, jewlery, nails)<br>
                                <input type="checkbox"/>&nbsp;No food above load lines (cold-well)<br>
                                <input type="checkbox"/>&nbsp;Clean, dry floors<br>
                                <input type="checkbox"/>&nbsp;No employee food in reach-in coolers<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card primary">
                    <div class="card-header">
                        <b>Primary</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Temperature:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox" class="tabbed-checklist"/>&nbsp;Check reach-in cooler temperature (inside and outside). Write temps on fridge.<br>
                                <input type="checkbox"/>&nbsp;AHA timers active and accurate (check for 90-second temping)<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Proper date label stickers on appropriate product:</label>
                            <div class="tabbed-checklist">
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Grean Leaf Lettuce<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Sliced Tomatoes<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Shredded Chicken (soup)<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Open Sliced Cheese<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Bacon Strips<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Sausage<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Gluten-Free Buns<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Cleaning & Sanitation:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Thermometers and sanitizer wipes in station<br>
                                <input type="checkbox"/>&nbsp;No chemicals at station<br>
                                <input type="checkbox"/>&nbsp;Utensils with proper colors: 5:30-10:30, Blue; 10:30-2:00, Green; 2:00-6:00, Black; 6:00-9:30/10:30, White<br>
                                <input type="checkbox"/>&nbsp;No dirty towels sitting on counters<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Proper uniform (hair nets, gloves, name tags, shirts, pants, jewlery, nails)<br>
                                <input type="checkbox"/>&nbsp;No food above load lines (cold-well)<br>
                                <input type="checkbox"/>&nbsp;Clean, dry floors<br>
                                <input type="checkbox"/>&nbsp;No employee food in reach-in coolers<br>
                                <input type="checkbox"/>&nbsp;Check handwashing sink (no food in the bottom of sink)<br>
                                <input type="checkbox"/>&nbsp;Check paper towel and soap dispenser (restock if empty)<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card hennys">
                    <div class="card-header">
                        <b>Breading & Henny's</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Temperature:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox" class="tabbed-checklist"/>&nbsp;Check reach-in cooler and rail temperature (inside and outside). Write temps on fridge.<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Proper date label stickers on appropriate product (check both sides of thaw cabinet for extra pans of chicken):</label>
                            <div class="tabbed-checklist">
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Filets<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Spicy Filets<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Grilled Filets<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Grilled Nuggets<br>
                                <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                <input type="checkbox"/>&nbsp;Chicken tracking cardboard has sticker and all pans are being tracked<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Cleaning & Sanitation:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Yellow thermometer and sanitizer wipes in station<br>
                                <input type="checkbox"/>&nbsp;No chemicals at station<br>
                                <input type="checkbox"/>&nbsp;No juice in bottom of thaw cabinets<br>
                                <input type="checkbox"/>&nbsp;No drip lines behind hennys and grills<br>
                                <input type="checkbox"/>&nbsp;No dirty towels sitting on counters<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Proper uniform (hair nets, gloves, name tags, shirts, pants, jewlery, nails)<br>
                                <input type="checkbox"/>&nbsp;No food above load lines (breading table rail)<br>
                                <input type="checkbox"/>&nbsp;Clean, dry floors<br>
                                <input type="checkbox"/>&nbsp;Employee drinks only stored on bottom shelf in a cup with a straw and a lid<br>
                                <input type="checkbox"/>&nbsp;Breading table and hennys are closed when not in use<br>
                                <input type="checkbox"/>&nbsp;Use first clip on pans in thaw cabinet<br>
                                <input type="checkbox"/>&nbsp;Wrap on all pans/open chicken<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card freezer">
                    <div class="card-header">
                        <b>Walk-In Freezer</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Clean, dry floors with <b>no product stored on the floor</b><br>
                                <input type="checkbox"/>&nbsp;Raw with raw and ready-to-eat with ready-to-eat<br>
                                <input type="checkbox"/>&nbsp;No opened or unsealed product<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card dining" style="margin-bottom: 30px;">
                    <div class="card-header">
                        <b>Front of House</b>
                    </div>
                    <div class="card-body row-custom justify-content-center">
                        <div class="form-group">
                            <label class="tabbed-checklist-label">Temperature:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox" class="tabbed-checklist"/>&nbsp;Check <b>all</b> reach-in coolers temperature (inside and outside). Write temps on fridge.<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Proper date label stickers on appropriate product (if an item is not on a tray, it must be individually stickered):</label>
                            <div class="tabbed-checklist">
                                <label class="tabbed-checklist-label">Reach-In Coolers:</label>
                                <div class="tabbed-checklist">
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Southwests<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Markets<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Sides<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Wraps<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Fruit Cups (SM, MD, & LG)<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Parfaits<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Kale Crunch<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Sliced Lemons<br>
                                </div>
                                <hr>
                                <label class="tabbed-checklist-label">Pitchers:</label>
                                <div class="tabbed-checklist">
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Lemonade<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Diet Lemonade<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Iced Coffee<br>
                                </div>
                                <hr>
                                <label class="tabbed-checklist-label">Dessert Toppings & Milk:</label>
                                <div class="tabbed-checklist">
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Strawberry Topping<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Half & Half<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Peach Topping (if in season)<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Peppermint Syrup & Chips (if in season)<br>
                                </div>
                                <hr>
                                <label class="tabbed-checklist-label">Extra Buckets:</label>
                                <div class="tabbed-checklist">
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Lemonade<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Diet Lemonade<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Sweet Tea<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Unsweet Tea<br>
                                    <input type="number" min="0" max="15" placeholder="0" class="date-label-counter"/>
                                    <input type="checkbox"/>&nbsp;Iced Coffee<br>
                                </div>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Cleaning & Sanitation:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;No buildup inside of ice bins (take off sliding lid and wipe it down with a blue towel and sanitizer wipe; use another sanitizer wipe to wipe all corners inside of each ice bin)<br>
                            </div>
                            <hr>
                            <label class="tabbed-checklist-label">Miscellaneous:</label>
                            <div class="tabbed-checklist">
                                <input type="checkbox"/>&nbsp;Proper uniform (name tags, shirts, pants, jewlery, watches or hairties, nails)<br>
                                <input type="checkbox"/>&nbsp;Jackets and reflective vests are not stored in cubbies or on counters<br>
                                <input type="checkbox"/>&nbsp;Employee drinks only stored behind swinging door in a cup with a straw and a lid<br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>