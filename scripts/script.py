from random import randrange

# Creating Users

out = open("./write.txt", "w")
'''
f = open("./read.txt", "r")
line = ""
firstInserts = []
lastInserts = []
while(True):
	line = f.readline()
	if (line == ""):
		break
	parts = line.split(",")
	firstInserts.append("INSERT INTO \"person\" (id, username, password) VALUES (" + str(int(parts[0]) + 5) + ", '" + parts[1] + "', '" + parts[2] + "');\n")
	lastInserts.append("INSERT INTO \"user\" (id, mail, name) VALUES(" + str(int(parts[0]) + 5) + ", '" + parts[3] + "', '" + parts[4][:-1] + "');\n")

for i in range(len(firstInserts)):
	out.write(firstInserts[i])

for i in range(len(lastInserts)):
	out.write(lastInserts[i])

f.close()
out.close()
'''

# Making Links between users
'''
def checkExists(links, first, second):
	for i in range(len(links)):
		if (links[i] == (first, second)):
			return True
	return False

links = []
i = 0
while (i < 500):
	first = randrange(3, 50)
	second = randrange(3, 50)

	while (second == first):
		second = randrange(3, 50)

	if (first > second):
		(first, second) = (second, first)

	if (checkExists(links, first, second)):
		continue
	else:
		links.append((first,second))
	i += 1

for i in range(len(links)):
	(first, second) = links[i]
	out.write("INSERT INTO \"link\" (user1_id, user2_id) VALUES(" + str(first) + "," + str(second) + ");\n")
'''

#Likes
'''
def checkExists(links, first, second):
	for i in range(len(links)):
		if (links[i] == (first, second)):
			return True
	return False

likes = []
i = 0
while (i < 2000):
	user = randrange(3, 51)
	post = randrange(1, 251)

	if (checkExists(likes, user, post)):
		continue
	else:
		likes.append((user,post))
	i += 1

for i in range(len(likes)):
	(user, post) = likes[i]
	if (randrange(1, 8) == 1):
		out.write("INSERT INTO \"like\" (post_id, user_id, likes) VALUES(" + str(post) + "," + str(user) + ", FALSE);\n")
	else:
		out.write("INSERT INTO \"like\" (post_id, user_id, likes) VALUES(" + str(post) + "," + str(user) + ", TRUE);\n")
'''

# Post Reports
'''
def checkExists(links, first, second):
	for i in range(len(links)):
		if (links[i] == (first, second)):
			return True
	return False

reports = []
i = 0
while (i < 30):
	first = randrange(3, 51)
	second = randrange(1, 251)

	if (checkExists(reports, first, second)):
		continue
	else:
		reports.append((first,second))
	i += 1

for i in range(len(reports)):
	(first, second) = reports[i]
	out.write("INSERT INTO \"report\" (user_id, post_id) VALUES(" + str(first) + "," + str(second) + ");\n")
'''


# Comment Reports

def checkExists(links, first, second):
	for i in range(len(links)):
		if (links[i] == (first, second)):
			return True
	return False

reports = []
i = 0
while (i < 30):
	first = randrange(3, 51)
	second = randrange(1, 160)

	if (checkExists(reports, first, second)):
		continue
	else:
		reports.append((first,second))
	i += 1

for i in range(len(reports)):
	(first, second) = reports[i]
	out.write("INSERT INTO \"report\" (user_id, comment_id) VALUES(" + str(first) + "," + str(second) + ");\n")


# User_group
'''
def checkExists(links, first, second):
	for i in range(len(links)):
		if (links[i] == (first, second)):
			return True
	return False

groups = []
i = 0
while (i < 75):
	user = randrange(3, 51)
	group = randrange(1, 10)

	if (checkExists(groups, user, group)):
		continue
	else:
		groups.append((user,group))
	i += 1

for i in range(len(groups)):
	(user, group) = groups[i]
	out.write("INSERT INTO \"user_group\" (user_id, group_id) VALUES (" + str(user) + "," + str(group) + ");\n")
'''

# Posts and comments

desc = ["The CEO of IKEA was just elected president in Sweden. He should have his cabinet together by the end of the week", "Passover ~ That time of the year when the Savior rises and the bread doesn''t.", "Although I can still party like an absolute rock star, it would appear that I cannot recover like one.", "Starting to make bread early for Easter... apparently it takes three days to rise", "The ship stuck in the Suez Canal is blocking so much important stuff they''ve decided to rename it the USS Mitch McConnell.", "My New Year''s resolution is to be more punctual.", "Children are the greatest gift of all, but punch some holes in the box so they can breathe.", "Remember when the air at gas stations for your tires was free? Good times, good years.", "Leprechauns are just Santa''s elves who got fired from the workshop for drinking on the job.", "Every McDonald''s should have a flag they fly at half mast when the ice cream machine is broken.", "The clock in my car is right again... a victory for procrastination.", "At the age of 91 we discovered two lumps in grandma''s breast, we were so relieved the doctors discovered it was just her knees.", "I had a vasectomy because I didn’t want any kids. When I got home, they were still there.", "Of all the things that taste like chicken, it''s weird that eggs are not one of them.", "Did it bother anyone else that the guy from the OPERATION game was clearly awake?", "So we are just letting March come back after the way it acted last year?", "I’m concerned, Mr Potato head & Mrs Potato head are no longer male or female. Does this mean there will be no more Tater tots?", "I love contactless delivery. They just throw the slop at your door and I run out like a little pig.", "If a tree falls in the forest and no one is there to hear it, do I still need a logging permit?", "Just did my own taxes. I should be in jail by Friday", "I''m a social vegan, I''m avoiding meets.", "Has anybody actually gotten salmonella from eating raw cookie dough or are people just trying to stop me from living my life?", "I’m tired of people complaining about $7.00 dollars beers, $10.00 dollars parking, and $20.00 dollars cover charge. Don’t like the prices? Stop coming to my house.", "Just give the Hedge Funds a 600 dollars check. They will be fine.", "I was playing air drums to Rush in my car and lost a stick out the window. I had to change over to Def Leppard.", "The Buccaneers perfectly captured the spirit of Tampa Bay by their feature player being a middle aged man who spent his career in the northeast and then moved to Florida to retire.", "Me: [donating body to Science] Science: [donates my body to Goodwill]", "Jesus invited prostitutes to dine with and he’s the light of the world, I do it and I’m “making Thanksgiving awkward.”", "Joe and Kamala should run off to Vegas and get inaugurated without telling us.", "As a kid my father used to hit me with his camera. I still get flashbacks", "It’s going to be a lot harder to overthrow the US Government on Pinterest.", "I am no longer impressed that Nicholas Cage managed to steal the Declaration of Independence.", "They say we can have gatherings with up to 8 people without issues. I don’t even know 8 people without issues.", "The rest of the world is watching America like America watched Tiger King.", "Nothing ruins a Friday like realizing it''s only Wednesday...", "If you have to guess what a commercial is selling, it''s always perfume.", "Dear Congress: Just turn off the lights, lock the doors and remain quiet... just like our schools have been doing the last decade", "We have a $740+ BILLION defense budget and the rest of the world just watched our Capitol get stormed by the cast rejects of Duck Dynasty.", "Farting under the covers it’s not longer a “Dutch oven”. It has become a COVID test. If you can smell or taste it, you’re negative.", "Why should I trust the toothpaste recommended by 4 out of 5 dentists when they''re the ones who make money fixing people''s teeth?", "I just called my bank and told them I want to find 11,780 more dollars in my account by tomorrow and that they counted wrong.", "Shout out to all the dads who got chores list cleverly disguised as Home Depot gift cards for Christmas", "My floors are so clean you can eat off of them. Look there is a Dorito there and some Cheerios under the couch...", "Sometimes you have throw away perfectly good printer paper to hide all the candy wrappers in your trash can.", "You think 2020 is bad, wait until it turns ‘21 and starts drinking.", "House warming parties are the number one cause of homelessness in the Eskimo community.", "What do you call a Christmas wreath made with $100 bills? Aretha Franklins", "I switched all the labels on the Spice rack..... I''m not in trouble yet, but the thyme is cumin.", "By the time we can have a drink in a bar again, Captain Morgan will be an Admiral.", "In other news...the Seven Dwarfs have been advised that they can only meet in groups of six. One of them isn''t Happy.", "This is the first year my family isn’t getting together for Thanksgiving due to Covid. Normally we don’t get together because we hate each other", "[inventor of teapot] I want this water to scream.", "What do you call a hen who can count her own eggs? A mathemachicken", "I misplaced my pizza cutter, so I used my Bryan Adams CD. It cuts like a knife", "I am forever disappointed that Chef Bobby Flay didn''t name his daughter Sue.", "2020 is what happens when you mix your Tarot deck with Cards Against Humanity", "I could be wrong, but I think the only way Trump is going to get to 270 is by losing about 50 pounds", "If your election lasts more than 48 hours, seek medical attention", "Feels like the whole country is on Maury waiting to find out who’s the father.", "The average Apple employee works 6 hours a day longer than an Apple battery.", "It''s great to hear from an old friend you haven''t spoken to in a while...if only to remind yourself why you don''t talk to them.", "Anyone else feel like Halloween is unnecessary this year? I mean I’ve been wearing a mask and eating candy for the last seven months. I don’t think I need a day dedicated to it anymore.", "Since drinking hasn’t killed me yet, I can only assume it’s making me stronger...", "I am having a weird day, first I found a hat full of money, then I got chased by a guy with a guitar.", "A tub of margarine fell on my foot 3 weeks ago and it still hurts. I can’t believe it’s not better.", "I have a step ladder. I never knew my real ladder, but my step ladder raised me.", "n Ancient Rome, there were 4 types of poison. Poisons I, II, and III would all kill you with varying degrees of pain. However, Poison IV would just make you really itchy.", "It was Hope Hicks, in the Rose garden, with the virus", "I looked at the keyboard earlier and I noticed ''U'' & ''I'' are together...it''s meant to be! Then I looked underneath it and it said JK.", "The winner of the first Presidential debate is...Tylenol Extra Strength!", "As chickens are descended from dinosaurs, dinosaur-shaped chicken nuggets must be the ultimate mockery of what their lineage has become.", "I am not turning my clock back on November 1st, I do not need another hour of 2020.", "One of my daughters wants to marry the mailman, but I won’t letter!", "To me, essential oils are what drips out of tacos.", "Amazon has been approved for drone delivery. We now have skeet shooting with prizes.", "Feel bad for all the kids who probably won''t be trick-or-treating this year, but just think of all the candy they''ll be for 50% off the day after!", "The first guy who heard a parrot talk was probably not ok for several days.", "‪I just saw 9 homeless people giving each other flu shots under the overpass. What a caring community we live in.", "The Rock announced that he and his wife and 2 daughters have recovered from COVID-19. They first suspected they had it when no one could smell what The Rock was cooking", "Well, Dwayne Johnson has Covid. Coronavirus really hit Rock Bottom.", "If 2020 were a drink, it would be a Colonoscopy Prep", "If I were a train engineer I would be constantly worried about fights breaking on top of my train.", "At some point, Subway convinced us all that it is ok to eat a whole loaf of bread in one sitting.", "We are gonna have to retire the phrase “avoid it like the plague” because it turns out people don’t do that.", "I’m gonna ask my mom if that offer to slap me into the next year still on the table.", "Why is the sea so strong? It has a lot of mussels", "Do I really need a hypnotist? I''m open to suggestions.", "I never thought I’d reach a point in my life where my hands have consumed more alcohol than my mouth.", "With the way 2020 has been going I couldn''t decide last night if I wanted to sit outside to watch the meteorite shower or take cover.", "Saw a clown this morning. He greeted me with a good morning. That was a nice jester", "I apologize for the coin shortage. I started a swear jar......", "‪I’m glad this pandemic didn’t affect me financially. I was already broke.", "If you are ugly with pretty eyes, this is your moment.", "Always give 100% unless you are giving blood.", "What''s the correct ratio of gunpowder to essential oils? I want this bath bomb to be perfect.", "You can''t expect a President who slept with porn stars to care about infectious diseases.", "‪I heard the government is putting chips inside of people. I hope I get Doritos .", "If you''re refusing to wear a mask around other people due to concerns that your brain won''t be getting enough oxygen, I think that ship already passed.", "‪Remember Darth Vader took his mask off once and die within minutes. ", "Calm down! Walmart is just asking you to wear a mask. You can still wear your pajamas and leave your bras and teeth at home.", "Let’s change the Redskins name to DC Marvels!", "Someone probably choked to death on food in the Death Star cafeteria and everyone thought it was Vader doing it.",
"I sleep better naked, why can''t the flight attendant understand this?", "The way America is handling the Coronavirus, I''m surprised Mexico hasn''t paid to finish the wall yet.", "My wife didn''t order anything from Amazon yesterday so the UPS guy knocked on our door to see if we''re okay.", "‪I just put some M&M’s into my mask and I am slowly eating them like a horse. I love the pandemic.", "‪This is the first year I am not going to Japan because of Covid-19. Usually I don’t go because I am poor. ‬", "You know whats really uncomfortable? Pants! But I still wear them in public, not for me but for others!", "Pavlov probably thought about feeding his dogs every time someone rang a bell.", "I hate it when I see some old person and then I realize we went to high school together.", "Has Covid-19 forced you to wear a mask and glasses at the same time? You may be entitled to condensation.", "Funny how just before the Coronavirus I was like \"I can''t believe gas is a $I 99\" And now I''m like \"I can''t believe gas is a $1.99\" but have totally two different meanings.", "Some vampires might get addicted to alcoholics.", "Calling someone a subpar golfer is very confusing.", "I used to sell security alarms door to door, and I was really good at it. If no one was home, I would just leave a brochure on the kitchen table.", "I''ve come to the conclusion that my Alexa is just another pet by how often I have to tell her no every day.", "I bet Canada feels like they are living in the apartment above a Meth Lab.", "Congratulations to the Astronauts that left Earth today. Good choice.", "No mask on your face You big disgrace Spreading your germs all over the place. Freddie Mercury,", "I recently bumped into the guy that sold me an antique globe. It''s a small world.", "If 2020 had a flavor. It would be orange juice and toothpaste.", "Because of Covid-19, for the first time since 1945 the National Spelling Bee is cancil... cancul... cansel... it’s been called off.", "The spread of the coronavirus is based on two factors. 1) How dense the population is. 2) How dense the population is.", "If you hate wearing a mask, you''re really not going to like the ventilator.", "Marijuana is legal but haircuts are not! It took almost 50 years but the hippies finally won.", "I''ve got this awful disease where I can''t stop telling airport jokes. The doctor says it''s terminal.", "‪If I use my stimulus money to buy baby chickens, does this mean we got money for nothing and chicks for free? ‬", "If you can''t look back at your younger self and realize that you were an idiot, you probably still are.", "If you want to impress me with your car, it had better be a food truck.", "Until further notice the days of the week are now called thisday, thatday, otherday, someday, yesterday, today, and nextday.", "‪I love getting cute morning texts like “your order has been shipped“‬", "Kim Jon Un is the type of leader to fake his death then punish everyone that celebrated.", "I need to social distance myself from the refrigerator so I can flatten my curve.", "Ever wonder how many news reporters, reporting from home, aren''t wearing pants?", "Ladies, even in social distancing, men exaggerate. They''ll claim it''s six feet, but it''s really only three.", "If we are being honest, we all have dated a man/woman that we would feed to a tiger.", "Quarantine starting to feel like Vegas in my house. Cocktails are acceptable at any hour, I’m losing money by the minute, and I don’t even know what time it is.", "Who else has been drunk the entire month of Mapril?", "Now''s a good time for Walmart to get all those shopping cart front wheels fixed.", "A guy at Kroger asked me if I know where Engagement, Ohio is. I said it''s between Dayton and Marion.", "The Casinos are now offering curbside pickup. Call ahead and they come out and take your money right from your car.", "When quarantine is over, let’s not tell some people.", "Quarantine tip: you never have to loosen your pants if you never wear any.", "When the virus is over I still want some of you to stay away from me.", "I used to spin that toilet paper like I was on Wheel of Fortune. Now I turn it like I''m cracking a safe", "Show of hands...how many of you are stuck in the house with a 75 something-year-old behaving like a toddler amped up on fun dip??", "Sometimes I wonder if I could get away with murder, but then I remember I can’t even eat pancakes without getting syrup all over me.", "Having some states lockdown, and some states not lockdown is like having a peeing section in the pool.", "Does anybody else''s car get 4 weeks to the gallon?", "Anyone know where I can get plastic eggs big enough to hide hand sanitizer in?", "My prediction of the “hot jobs” in about a year. Obstetricians, divorce lawyers and fitness trainers", "Hey folks, don''t forget to run out and get your Powerball tickets tonight. The jackpot is up to a 24 pack roll of Charmin.", "I would listen to Bill Gates when he talks about CoronaVirus, he has been dealing with viruses since Windows 95.", "AFTER ISOLATION..... Friend: Where''s your husband? Wife: In the garden. Friend: I didn''t see him. Wife: You need to dig a little.", "My body has absorbed so much soap and disinfectant lately, that when I pee it cleans the toilet bowl.", "The bank teller was wearing a mask, so I gave her all my money.", "We are about two weeks away from knowing everyone’s true hair color.", "Funny how by doing the responsible thing and staying home the more homeless you look.", "Before you complain too much about your situation, remember, someone is quarantined with your ex.", "So when do we get assigned our Hunger Games districts?", "Sadly, the Coronavirus has better coverage than T-Mobile.", "For the average American the best way to tell if you have Covid-19 is to couch in a rich person’s face and wait for their test result.", "Oh so now its okay to go to the bank with a mask and gloves.", "Gotta say that the class of 2020 outdid themselves with Senior Skip Day this year.", "I''ve run out of toilet paper and I''m now using lettuce leaves. This morning was just the tip of the iceberg.", "The world all of a sudden feels like a casual stroll through a Chuck E. Cheese ball pit at the end of a busy weekend.", "How long is this social distancing going on? My wife keeps trying to come back in the house.", "A man and a woman can go 21 days on Naked and Afraid with no toilet paper and you sissys can''t go one day without 20 rolls.", "9:00 pm is time to remove your day pajamas and put your night pajamas on.", "Kenny Rogers checking out during an apocalypse is the biggest knowing when to Hold''em knowing when to Fold''em I''ve ever seen.", "I went to the bank today. I saw a man with a mask and gloves come in and thank God he was just there to rob the bank.", "I’m about 1 week away from being friends with a volleyball.", "To go to the grocery store, they said a mask and some gloves would be fine. They lied! Everyone else had on clothes!", "We are about three weeks away from knowing everyone’s true hair color.", "Today''s drink: The Quarantini. It''s a regular martini, but you drink it alone in your house.", "I hadn’t planned on giving this much up for Lent!", "I’m not going to post anything else about toilet paper, I’m pretty wiped out from it..", "This will probably be the St Patrick''s Day with the least DUI''s ever.", "‪The reason stores are running out of toilet paper is because when one person sneezes the other 100 poop themselves. ‬", "You know that stash of fast food napkins in your glove box? It’s about to be their time to shine.", "Nine months from now a boom of babies will be born, and we will call them Coronials!", "April’s fool day is cancelled this year as no made up prank could matched the unbelievable stuff happening in the real world right now.", "If a virus ever originates in my area, I’m guessing it will be called the “Pabst Blue Ribbon” virus.", "Before Coronavirus, I''d cough to cover a fart. Now I fart to cover a cough", "John Travolta was hospitalized for suspected COVID-19, but doctors now confirm that it was only Saturday Night Fever, and they assure everyone that he is Staying Alive. Apparently he had chills that were multiplying.", "Somewhere in the world Howie Mandel is walking around with full body Hazmat Suit.", "I''ve always known my lifetime of alienating friends and family would one day pay off.", "Purell is the most expensive bottle of alcohol in the country.", "Snow White is down to 6 dwarfz. Sneezy is now placex in quarantine.", "Coronavirus won''t last long, it was made in China.", "I use a blender to make protein shakes in my office every day. That way when I use it to mix up a pitcher of margaritas no one even notices.", "Katherine Johnson was a badass mathematician until the very end. She waited until turning 101 so she can die on her “Prime”", "I won''t consider myself successful until someone follows me around with a cooler of gatorade to dump over my head whenever I win at anything.", "‪Just find out there’s no popcorn on popcorn shrimp. Guess there is no reason to try Pot Roast ‬", "I went to see a fat psychic the other day..... well it was actually a four chin teller.", "‪Never trust a train...... they have Loco Motives. ‬", "For 5 dollars you can either get your girl/guy a Valentine gift OR you can get them the Costco rotisserie chicken. That’s all I’m saying, the choice is yours", "My medic alert bracelet warns first responders that I kiss back during CPR.", "‪Life is boring when you don’t have an online order to look forward to .", "‪I set my alarm extra early to make sure I have enough time to lay in bed and be angry about having to get up.", "‪I set my clock ahead to prevent being late but all it really did is sharpen my skills of subtraction. ‬", "Bees build homes with their mouths and defend with their butts. Spiders build homes with their butts and defend with their mouths.", "Saying someone has a dry sense of humor implies the existence of wet senses of humor.",
 "Can we just call the Chinese Corona Virus Kung Flu?", "You picture a lot more hair when you hear \"Hair\" as opposed to hearing \"Hairs\".", "My grief counselor just died. I really don’t care. I guess we made progress.", "Canadian bacon is just ham that''s apologizing for not being bacon.", "The problem with driving an old air-cooled Volkswagen bus is kids keep mistaking it as an ice cream truck, and the worst part is it''s so slow they could almost catch you.", "The name Pinball would also be a perfect name for Bowling.", "Any man that believes women are \"the weaker sex,\" has never tried to reclaim his half of the blankets on a cold winter''s night...", "Glitter is the herpes of craft supplies. Once it’s on you, it’s there forever.", "According to Pinterest, I''m severely under-utilizing mason jars.", "My wife felt me because I’m dyslexic.", "A penny saved is more than a penny earned, because a penny earned is taxed.", "The first rule of passive aggressive club is, y''know what, never mind, it''s fine...", "If you don’t get hired for an unpaid internship it literally makes no difference. Just show up and start working. What are they gonna do, pay you?", "Never challenge a stormtrooper to Russian roulette.", "Don''t judge a book by its movie.", "Since the ocean has meat, salt, and veg in it, it is technically a big thing of soup.", "Three things I’m thankful for this time of year: Family, Friends and Caller ID to avoid the first two things.", "I can’t wait for next week when the gym is empty again.", "Pancakes: Because NO, you cannot have cake for breakfast, but you can have fried cake for breakfast.", "I can''t find my \"Gone in 60 Seconds\" DVD. It was here a minute ago.", "I can''t wait till New Year''s Day 2021. Then I can say hindsight is really 2020.", "Big deal Times Square. I drop the ball at least 3 times a week.", "‪Local man addicted to Brake Fluid says he can stop at any time. ‬", "I got a Roomba for Christmas. It seriously picks up a lot of dirt. For example it found out my neighbors wife has been having an affair for 3 years and also my other neighbor is behind on her mortgage by 3 months", "Tampon makers have announced that they will be replacing their tampon string with tinsel. They''ll only be available for the Christmas period.", "‪My ability to remember a song lyric from the 80’s far exceeds my ability to remember why I walked into the kitchen. ‬", "Christmas Tip: Wrap empty boxes and put them under the tree. Every time your child acts up, throw one in the fireplace.", "I''ve decided to kill off a few characters in the book I''m writing. I really think it will spice up my autobiography.", "No matter how bad your attempt at breaking into a prison, it''ll work.", "Cinnamon is just sawdust with good PR.", "Is it to early to break my new year''s resolution or should I wait until after Christmas?", "We squint at the sun because it''s bright. We squint at people because they''re not.", "Airport security has just made sure that I don''t have weapons or prostate cancer.", "Does anyone in this group know of an old couple or even a single old lady or man who will be eating alone this Christmas? I am having friends and relatives over and need to borrow a few chairs.", "I hate how celebrities always die in 3 like Jimi Hendrix, Janis Joplin, and Jim Morrison and sometimes literally on the same day like Buddy Holly, Ritchie Valens and the Big Bopper and now Oscar the Grouch, Big Bird and Caroll Spinney.", "‪Roadside sobriety test are getting ridiculous. Last night I had to fold a fitted sheet .", "I''m convinced that every time a sock goes missing from the dryer, it comes back as an extra tupperware lid.", "For dogs, Santa must be like the final boss of mailmen.", "You can tell the age of an artificial Christmas tree by the lines of duct tape around the box it''s stored in.", "I have a lot of imaginary friends. They are real people, I just have to pretend they are my friends.", "Baby Yoda''s first word probably came after his second word", "I am trying to get into the Christmas \"spirit\" but can''t get the bottle open...", "My phone auto-corrected \"wish you were here\" to \"wish you were beer\". I sent it anyways...", "If your ever wondering if a tree is of the Dogwood variety you could tell by its bark.", "I really want to buy one of the grocery checkout dividers but the lady behind the counter keeps putting it back.", "‪I hate when Wal-Mart doesn’t have what I need and I have to go home, change out my pajamas, take a shower and go to Target. ‬", "Black Friday is as close to the Purge as we will get in America..."]# "My five year plan is to make it through this year."]‬
date = ["2020-01-07", "2020-01-11", "2020-01-12", "2020-01-12", "2020-01-18", "2020-02-05", "2020-02-08", "2020-02-14", "2020-03-03", "2020-03-12", "2020-03-18", "2020-03-20", "2020-04-03", "2020-04-08", "2020-04-24", "2020-04-25", "2020-04-29", "2020-05-02", "2020-05-06", "2020-05-07", "2020-05-15", "2020-05-20", "2020-05-20", "2020-05-24", "2020-05-31", "2020-06-02", "2020-06-11", "2020-06-17", "2020-06-21", "2020-06-22", "2020-06-24", "2020-06-28", "2020-07-06", "2020-07-20", "2020-07-20", "2020-07-20", "2020-07-23", "2020-07-23", "2020-07-28", "2020-07-31", "2020-08-01", "2020-08-01", "2020-08-12", "2020-08-14", "2020-08-15", "2020-08-22", "2020-09-05", "2020-09-05", "2020-09-08", "2020-09-16", "2020-09-19", "2020-09-23", "2020-09-26", "2020-09-27", "2020-10-21", "2020-10-22", "2020-10-27", "2020-10-31", "2020-11-04", "2020-11-15", "2020-11-16", "2020-11-17", "2020-11-18", "2020-11-24", "2020-12-04", "2020-12-11", "2020-12-13", "2020-12-20", "2020-12-26", "2020-12-26", "2021-01-11", "2021-01-13", "2021-01-16", "2021-01-22", "2021-01-23", "2021-01-28", "2021-01-28", "2021-02-12", "2021-02-15", "2021-02-16", "2021-03-03", "2021-03-10", "2021-03-15", "2021-03-17", "2021-03-26", "2021-04-03", "2021-04-05", "2021-04-06", "2021-04-08", "2021-04-09", "2021-04-09", "2020-01-07", "2020-01-11", "2020-01-12", "2020-01-12", "2020-01-18", "2020-02-05", "2020-02-08", "2020-02-14", "2020-03-03", "2020-03-12", "2020-03-18", "2020-03-20", "2020-04-03", "2020-04-08", "2020-04-24", "2020-04-25", "2020-04-29", "2020-05-02", "2020-05-06", "2020-05-07", "2020-05-15", "2020-05-20", "2020-05-20", "2020-05-24", "2020-05-31", "2020-06-02", "2020-06-11", "2020-06-17", "2020-06-21", "2020-06-22", "2020-06-24", "2020-06-28", "2020-07-06", "2020-07-20", "2020-07-20", "2020-07-20", "2020-07-23", "2020-07-23", "2020-07-28", "2020-07-31", "2020-08-01", "2020-08-01", "2020-08-12", "2020-08-14", "2020-08-15", "2020-08-22", "2020-09-05", "2020-09-05", "2020-09-08", "2020-09-16", "2020-09-19", "2020-09-23", "2020-09-26", "2020-09-27", "2020-10-21", "2020-10-22", "2020-10-27", "2020-10-31", "2020-11-04", "2020-11-15", "2020-11-16", "2020-11-17", "2020-11-18", "2020-11-24", "2020-12-04", "2020-12-11", "2020-12-13", "2020-12-20", "2020-12-26", "2020-12-26", "2021-01-11", "2021-01-13", "2021-01-16", "2021-01-22", "2021-01-23", "2021-01-28", "2021-01-28", "2021-02-12", "2021-02-15", "2021-02-16", "2021-03-03", "2021-03-10", "2021-03-15", "2021-03-17", "2021-03-26", "2021-04-03", "2021-04-05", "2021-04-06", "2021-04-08", "2021-04-09", "2021-04-09", "2020-01-07", "2020-01-11", "2020-01-12", "2020-01-12", "2020-01-18", "2020-02-05", "2020-02-08", "2020-02-14", "2020-03-03", "2020-03-12", "2020-03-18", "2020-03-20", "2020-04-03", "2020-04-08", "2020-04-24", "2020-04-25", "2020-04-29", "2020-05-02", "2020-05-06", "2020-05-07", "2020-05-15", "2020-05-20", "2020-05-20", "2020-05-24", "2020-05-31", "2020-06-02", "2020-06-11", "2020-06-17", "2020-06-21", "2020-06-22", "2020-06-24", "2020-06-28", "2020-07-06", "2020-07-20", "2020-07-20", "2020-07-20", "2020-07-23", "2020-07-23", "2020-07-28", "2020-07-31", "2020-08-01", "2020-08-01", "2020-08-12", "2020-08-14", "2020-08-15", "2020-08-22", "2020-09-05", "2020-09-05", "2020-09-08", "2020-09-16", "2020-09-19", "2020-09-23", "2020-09-26", "2020-09-27", "2020-10-21", "2020-10-22", "2020-10-27", "2020-10-31", "2020-11-04", "2020-11-15", "2020-11-16", "2020-11-17", "2020-11-18", "2020-11-24", "2020-12-04", "2020-12-11", "2020-12-13", "2020-12-20", "2020-12-26", "2020-12-26", "2021-01-11", "2021-01-13", "2021-01-16", "2021-01-22", "2021-01-23", "2021-01-28", "2021-01-28", "2021-02-12", "2021-02-15", "2021-02-16", "2021-03-03", "2021-03-10", "2021-03-15", "2021-03-17", "2021-03-26", "2021-04-03", "2021-04-05", "2021-04-06", "2021-04-08", "2021-04-09", "2021-04-09"]

comments = ["Fabulous work!", "Black. Jesus Christ. How do you do it?", "Hugely incredible =)", "I think clients would love this.", "Mission accomplished. It''s admirable!!", "My 34 year old daughter rates this boldness very minimal!", "This concept has navigated right into my heart.", "Alluring! I admire the use of style and playfulness!", "Delightful. So simple.", "Just elegant =)", "Immensely alluring notification =)", "Nice use of fuschia in this shot mate", "I want to learn this kind of work! Teach me.", "Such radiant.", "Jesus Christ. How do you do it?", "This is killer work!!", "Strong work you have here.", "I think I''m crying. It''s that amazing.", "Fold, typography, atmosphere, shot – sick!", "It''s delightful not just admirable!", "This shot blew my mind.", "Let me take a nap... great shot, anyway.", "That''s fabulous and elegant dude", "This shapes blew my mind.", "This is slick work, friend.", "Red. Everything feels nice.", "Congrats on the new adventure!!", "It''s admirable not just alluring!", "This is new school.", "Killer spaces dude", "Exquisite work you have here.", "Vastly killer m8", "Let me take a nap... great shot, anyway.", "I think I''m crying. It''s that admirable.", "Yup.", "Looks sleek and fab m8", "My 63 year old brother rates this shapes very elegant mate", "Extra thought out! You just won the internet!", "I want to make love to your shot :-)", "Mission accomplished. It''s killer.", "Such shot, many avatar, so fabulous", "Such nice.", "This shot has navigated right into my heart.", "Nice use of ivory in this texture!", "Just revolutionary =)", "Beastly m8 I want to make love to the use of hero and fold!", "Shade, blur, shapes, colour – sexy dude", "I want to learn this kind of fold! Teach me.", "Revolutionary. So graceful.", "Overly engaging icons!!", "This atmosphere has navigated right into my heart.", "I think I''m crying. It''s that good.", "Tremendously thought out! I wonder what would have happened if I made this", "This shot blew my mind.", "Really magnificent!", "Let me take a nap... great shapes, anyway.", "Admirable =) I adore the use of layers and lines!", "It''s magnificent not just amazing!", "Outstandingly cool notification mate", "My 56 year old son rates this idea very alluring!", "This is magnificent work :-)", "Shape, iconography, camera angle, atmosphere – clean m8", "Sublime work you have here.", "Bold. So simple.", "Found myself staring at it for minutes.", "Sleek notification mate", "Such alluring.", "Violet. I wonder what would have happened if I made this", "Found myself staring at it for minutes.", "I want to learn this kind of style! Teach me.", "Mission accomplished. It''s strong :-)", "Looks fresh and incredible dude", "Just slick =)", "Nice use of cyan in this shapes m8", "Such shot, many style, so excellent", "I want to make love to your design.", "Mmh wondering if this comment will hit the generateor as well...", "Very splendid :)", "I''d love to see a video of how it works.", "I want to learn this kind of type! Teach me.", "Really thought out! Everything feels nice.", "This is gorgeous work.", "Looks engaging and magnificent dude", "Let me take a nap... great shot, anyway.", "Everything feels nice.", "Nice use of grey in this atmosphere dude", "I think I''m crying. It''s that sick.", "It''s slick not just splendid!", "This notification blew my mind.", "Killer work you have here.", "Sick! Adore the use of shade and gradient!", "Truly fun experience!", "I want to learn this kind of button! Teach me.", "Mission accomplished. It''s slick.", "You just won the internet!", "Whoa.", "I approve your notification :)", "It''s minimal not just excellent!", "Sky blue. Trying it now.", "Cool atmosphere =)", "Tremendously revolutionary dude", "This boldness has navigated right into my heart.", "I''d love to see a video of how it works.", "Fold, layers, job, notification – simple.", "Such sick.", "Just sleek =)", "My 32 year old son rates this concept very incredible dude", "Delightful. So classic.", "Hugely thought out! How do you make this? Photoshop?", "Let me take a nap... great concept, anyway.", "I think I''m crying. It''s that killer.", "Such style, many pattern, so appealing", "This is elegant work :-)", "Nice use of charcoal in this shot :-)", "This is exquisite and excellent :)", "You are so inspiring!", "Exquisite, friend. I want to make love to the use of shape and background!", "Nice use of sky blue in this colours, friend.", "Sublime work you have here.", "This animation blew my mind.", "Layout, background, shot, work – appealing.", "This is alluring work, friend.", "I think I''m crying. It''s that fabulous.", "Such gorgeous.", "My 22 year old niece rates this icons very nice mate", "Engaging. It keeps your mind occupied while you wait.", "These are bold and excellent =)", "It''s graceful not just bold!", "Everything feels nice.", "Excellent shot =)", "Really clean boldness!", "Mission accomplished. It''s admirable.", "Overly excellent!", "Such atmosphere, many fold, so nice", "Ivory. You just won the internet!", "This design has navigated right into my heart.", "Just sleek :)", "Highly thought out! Trying it now.", "Let me take a nap... great shot, anyway.", "I like your shapes mate", "I want to learn this kind of texture! Teach me.", "Alluring. So bold.", "Shade, fold, shot, colour – clean!", "It''s elegant not just magnificent!", "Fuschia. Leading the way mate.", "Super thought out! Jesus Christ. How do you do it?", "I want to learn this kind of shade! Teach me.", "Nice use of baby blue in this experience =)", "Revolutionary texture =)", "This is magical work :)", "Ahhhhhhh...", "Slick :-) I want to make love to the use of iconography and blur!", "Truly magical :)", "This notification blew my mind.", "Everything feels nice.", "Magnificent. So amazing.", "Adore your colour =)", "Let me take a nap... great texture, anyway.", "Magnificent work you have here."]

file = open("datas.txt", "r")

f = file.read()

x = f.split(",")

# Comments
'''
for i in range(0, len(comments)):
    if (randrange(1, 15) == 5):
        out.write("INSERT INTO \"comment\" (post_id, \"user_id\", \"text\", deleted) VALUES (" + str(randrange(1, 250)) + ", " + str(randrange(3, 50)) + ", " + "'" + comments[i] + "'" + ", TRUE);\n")
    else:
        out.write("INSERT INTO \"comment\" (post_id, \"user_id\", \"text\") VALUES (" + str(randrange(1, 250)) + ", " + str(randrange(3, 50)) + ", " + "'" + comments[i] + "'" + ");\n")
'''
# Posts
'''
for i in range(0, len(desc)):
    if (randrange(1, 6) == 1):
        if (randrange(1, 4) == 1):
            out.write("INSERT INTO \"post\" (user_id, picture, description, date, private) VALUES (" + str(randrange(3, 50)) + ", " + "'" + "./html/images/posts/" + str(i+1) +  "',"  + "'" + desc[i] + "', '" + x[i] + "', TRUE);\n")
        else:
            out.write("INSERT INTO \"post\" (user_id, description, date, private) VALUES (" + str(randrange(3, 50)) + ", '" + desc[i] + "', '" + x[i] + "', TRUE);\n")
    elif (randrange(1, 11) == 5):
        if (randrange(1, 4) == 1):
            out.write("INSERT INTO \"post\" (user_id, picture, description, date, group_id) VALUES (" + str(randrange(3, 50)) + ", " + "'" + "./html/images/posts/" + str(i+1) +  "',"  + "'" + desc[i] + "', '" + x[i] + "', " + str(randrange(1, 11)) + ");\n")
        else:
            out.write("INSERT INTO \"post\" (user_id, description, date, group_id) VALUES (" + str(randrange(3, 50)) + ", '" + desc[i] + "', '" + x[i] + "', " + str(randrange(1, 11)) + ");\n")
    else:
        if (randrange(1, 4) == 1):
            out.write("INSERT INTO \"post\" (user_id, picture, description, date) VALUES (" + str(randrange(3, 50)) + ", " + "'" + "./html/images/posts/" + str(i+1) +  "',"  + "'" + desc[i] + "', '" + x[i] + "');\n")
        else:
            out.write("INSERT INTO \"post\" (user_id, description, date) VALUES (" + str(randrange(3, 50)) + ", '" + desc[i] + "', '" + x[i] + "');\n")
'''

'''
# Create passwords scripted
from passlib.hash import bcrypt

f = open("laravel/resources/sql/seed.sql", "r")
temp = open("temp", "w")

while(True):
    line = f.readline()
    if (line == ''):
        break;
    if (line.startswith("INSERT INTO \"person\" (username, password")):
        print(line)
        parts = line.split('\'')
        temp.write(parts[0])
        temp.write("'")
        temp.write(parts[1])
        temp.write("'")
        temp.write(parts[2])
        temp.write("'")
        temp.write(bcrypt.hash(parts[3]))
        temp.write("'")
        temp.write(parts[4])
'''