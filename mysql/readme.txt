redisģ��΢���ļ��û�����
�����û�����ɾ�Ĳ飬��ע�ȹ���
-------------------------------
ҳ�洴��˳���빦��������
1��redis.php		//redisʵ���������ӡ���֤
2��add.php			//����û����ύ��reg.php
3��reg.php			//����post��ֵ��userid(string)��user:id(hashs)��uid(list)��username:username(string)
4��login.php		//form����½����ҳ����֤������cookie����תlistҳ��
5��list.php			//�жϵ�½״̬����ӭ��username����ҳ������������ע����ע��
6��addfans.php		//��ӷ�˿��id��ע˭��uid˭��ע��following��ע��followers��˿
7��mod.php			//�޸�ҳ�棬ͨ��id��ȡ��ֵ����
8��domod.php		//����ֵ���Ǿ�ֵ
9��del.php			//ɾ���û���hash����list��ֵ
10��logout.php		//�ǳ���authɾ����cookieʧЧ
-------------------------------
keys���ͣ�

userid					//string������id����
user:$uid				//hash������û�����
uid 					//list�����ids�û������ͷ�ҳ
username:$username		//string�����ڴ���û�id�����ڵ�¼ʱ��ѯ
auth:$auth				//string�����ڴ�ŵ�½�û�cookie���жϵ�½״̬
user:$id:following		//set�����ڴ��id�û��Ĺ�ע��Ա
user:$id:followers		//set���û����id�û�����ע�ĳ�Ա