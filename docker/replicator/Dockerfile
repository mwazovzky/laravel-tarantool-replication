FROM centos:7

RUN yum -y install git ncurses-devel cmake make gcc-c++ boost boost-devel wget unzip nano bzip2 mysql-devel mysql-lib
RUN git clone https://github.com/tarantool/mysql-tarantool-replication.git
WORKDIR /mysql-tarantool-replication
RUN git submodule update --init --recursive
RUN yum -y install make
RUN cmake .
RUN make

FROM centos:7
COPY --from=0 /mysql-tarantool-replication/replicatord /usr/local/bin/
