#!/usr/bin/perl

use Data::Dumper;
use MIME::Base64
$|;

open(R,"/usr/local/nagios/var/status.dat");

$count=0;
$counter=0;
our %host_comments =();
our %service_comment=();
%comments =();
$object_type='';
while(<R>){

        if($_ =~/hostcomment|servicecomment/){
                $count++;
                $object_type = $_;

                $object_type=~s/{//;

                chomp($object_type);

        }elsif($_=~/}/){

        }else{

                my($objvar,$objval)=split('=',$_);
                $objvar=~s/\t//g;
                chomp($objvar);
                chomp($objval);
                if(length($objvar)>0){
                $comments{$count}{$object_type}{$objvar}=$objval;
                }
        }
}


  foreach my $key1 (keys %comments) {

            foreach my $key2 (keys %{$comments{$key1}}) {



                        if($key2 eq "servicecomment "){

                                        $host_name=$comments{$key1}{$key2}{'host_name'};

                                        $sdesc=$comments{$key1}{$key2}{'service_description'};
                                        chomp($sdesc);
                                        $sdesc=~s/\n//;
                                        #print "$sdesc=>";
                                        $sdesc=encode_base64($sdesc);
                                                                                $sdesc=~s/\n//;
                                        #print "$sdesc/";

                                        $comment_data=$comments{$key1}{$key2}{'comment_data'};
                                        $date=convert_time($comments{$key1}{$key2}{'entry_time'});
                                        $auth=$comments{$key1}{$key2}{'author'};

                                        $service_comment{$host_name}{"$sdesc"}="$comment_data - <font color=#456789> by </font> $author <font color=#456789> on </font> $date";

                        }else{

                                        $host_name=$comments{$key1}{$key2}{'host_name'};
                                        $comment_data=$comments{$key1}{$key2}{'comment_data'};
                                        $commentdate=convert_time($comments{$key1}{$key2}{'entry_time'});
                                        $author=$comments{$key1}{$key2}{'author'};


                                $host_comment{$host_name}="$comment_data - <font color=#456789>by </font> $author <font color=#456789>on</font> $commentdate";




                        }

                }
        }

#print Dumper %service_comment;
sub convert_time {

        my $date_str ='';

        my $timestamp =shift;

my    ($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime($timestamp);
        $mon++;
        $year+=1900;
$date_str="$mday/$mon/$year $hour:$min:$sec";

        return $date_str;

}

1;
