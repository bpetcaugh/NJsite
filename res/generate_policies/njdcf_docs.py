doc_list = list()
count = 0
pol_count = 0

def containsAny(str, set):
    """ Check whether sequence str contains ANY of the items in set. """
    return 1 in [c in str for c in set]

set_category = ""
set_vol = ()
set_chapter = ()
set_sub_chapter = ()

with open('policymanual2.csv','r',newline="") as csvfile:
    for line in csvfile:
        isPolicy = True
        line = line.strip()
        count += 1
        if count>639:
            break

        if line[0].isalpha():
            if "Vol." not in line:
                if "Chapter" not in line:
                    if "Subchapter" not in line:
                        set_category = line.strip()
                        isPolicy = False

        if "Vol." in line:
            line_list = line.split("-")
            v = line_list[0].split(".")
            set_vol = (v[1].strip(), line_list[1])
            isPolicy = False
        if "Chapter" in line:
            line_list = line.strip().split("-")
            c = line_list[0].strip().split(" ")
            set_chapter = (c[1].strip(), line_list[1])
            isPolicy = False
        if "Subchapter" in line:
            line_list = line.strip().split("-")
            s = line_list[0].strip().split(" ")
            set_sub_chapter = (s[1].strip(), line_list[1])
            isPolicy = False

        if isPolicy:
            nline = line.strip().split(" - ")
            print(count, nline)
            if len(nline) == 2:
                nline.append("none") #No Policy Number
            policy = (nline[0].strip(), nline[1].strip(), nline[2].strip())
            pol_count += 1
            doc_list.append([set_category, set_vol, set_chapter, set_sub_chapter, policy])

print(pol_count)
#print(doc_list)
builder_list = list()
for tp in doc_list:
    builder = f'INSERT INTO policies (category, volume_num, volume_name, chapter_num, chapter_name, subch_num, subch_name, policy_num, policy_name, file_name) VALUES ("{tp[0]}", "{tp[1][0]}", "{tp[1][1]}", "{tp[2][0]}", "{tp[2][1]}", "{int(tp[3][0])}", "{tp[3][1]}", "{tp[4][0]}", "{tp[4][1]}", "{tp[4][2]}");\n'
    builder_list.append(builder)


with open("njsql2.txt", "w") as f:
    for line in builder_list:
        f.write(line)
