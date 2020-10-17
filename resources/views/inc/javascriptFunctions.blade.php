
function getAvg( a ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

function getMax( a ) {
    var max = -1;
    for(i in a)
    if(i!="name" && i!="id" && a[i] != null && max < a[i]) {
        max = a[i];
    }
    return max;
}

function getMin( a ) {
    var min = 101;
    for(i in a)
    if(i!="name" && i!="id" && a[i] != null && min > a[i]) {
        min = a[i];
    }
    return min;
}

function getMath( a ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && isMath(i) && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

function getProg( a ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && isProg(i) && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

function getSoftware( a ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && isSoftware(i) && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

function getNetwork( a ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && isNetwork(i) && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

function getAI( a ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && isAI(i) && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

function isMath( i ) {
    return i=="calculus1" || i=="non_linear_algebra" || i=="calculus2" || i=="linear_algebra" || i=="calculus3" || i=="statistics" || i=="discrete_math" || i=="calculus4" || i=="researchs";
} 

function isProg( i ) {
    return i=="programming1" || i=="computer_principles" || i=="programming2" || i=="programming_advanced1" || i=="discrete_math" || i=="programming_advanced2" || i=="database" || i=="computing" || i=="algo" || i=="operation_system" || i=="AI" || i=="complexity";
}

function isSoftware( i ) {
    return i=="programming2" || i=="programming_advanced1" || i=="programming_advanced2" || i=="database" || i=="complexity" || i=="software_engineering";
}

function isAI( i ) {
    return i=="AI";
}

function isNetwork( i ) {
    return i=="networks" || i=="operation_system" || i=="connection_theory" || i=="information_theory" || i=="computer_architicture";
}

function isSemester( a , b ) {
    if(a == 1) return b=="programming1" || b=="calculus1" || b=="non_linear_algebra" || b=="physics1" || b=="arabic" || b=="english1" || b=="computer_principles";
    if(a == 2) return b=="programming2" || b=="calculus2" || b=="linear_algebra" || b=="physics2" || b=="patrioty" || b=="english2";
    if(a == 3) return b=="programming_advanced1" || b=="calculus3" || b=="statistics" || b=="electronic_circuit" || b=="discrete_math" || b=="english3";
    if(a == 4) return b=="programming_advanced2" || b=="calculus4" || b=="signals" || b=="database" || b=="researchs" || b=="english4";
    if(a == 5) return b=="computing" || b=="logical_circuit" || b=="algo" || b=="communication" || b=="connection_theory" || b=="operation_system";
    if(a == 6) return b=="software_engineering" || b=="computer_architicture" || b=="information_theory" || b=="networks" || b=="complexity" || b=="AI";
}

function getMarkFreq( a , b ){
    var num = 0;
    for(i in a)
    if(i!="name" && i!="id" && a[i] != null && b == a[i]) 
        num++;
    
    return num;
}

function changeColorAndContent(a , b , id1 , id2) {
    document.getElementById(id1).textContent = a;
    document.getElementById(id2).textContent = b;
    if(a < b){
        document.getElementById(id1).style.color = "red";
        document.getElementById(id2).style.color = "green";
    } else if(a > b) {
        document.getElementById(id2).style.color = "red";
        document.getElementById(id1).style.color = "green";
    } else {
        document.getElementById(id2).style.color = "green";
        document.getElementById(id1).style.color = "green";
    }
}

function changeContentOfNumOfMarks(a , b , id1 , id2) {
    var cur = document.getElementById('text').value;
    var value1 = getNum( a , cur );
    var value2 = getNum( b , cur );
    changeColorAndContent( value1 , value2 , id1  , id2  );
}

function getNum( a , b ) {
    var num = 0;
    for(i in a)
    if(i!="name" && i!="id" && a[i] != null && b <= a[i]) 
        num++;
    
    return num;
}

// a is the row for student , b is the semester number
function calcAvgForSemesters( a , b ) {
    var sum = 0 , num = 0;
    for(i in a)
    if(i!="name" && i!="id" && isSemester(b , i) && a[i]!=null && a[i]>=60) {
        sum += a[i];
        num++;
    }
    return sum / num;
}

// select menu for subject in compare
function changeSubject( a , b , c , id1 , id2 ) {
    var val1 = b[a.target.value];
    var val2 = c[a.target.value];
    var ele1 = document.getElementById(id1);
    var ele2 = document.getElementById(id2);
    ele1.textContent = val1;
    ele2.textContent = val2;
     
    if(val1 > val2){
        ele1.style.color = "green";
        ele2.style.color = "red";
    } else if(val1 < val2) {
        ele2.style.color = "green";
        ele1.style.color = "red";
    } else {
        ele1.style.color = "green";
        ele2.style.color = "green";
    }
}
