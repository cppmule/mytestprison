package com.alibaba.test;

import mockit.Mocked;

import org.jtester.annotations.AutoBeanInject;
import org.jtester.annotations.SpringApplicationContext;
import org.jtester.annotations.SpringBeanByName;
import org.jtester.core.IJTester.Expectations;
import org.jtester.testng.JTester;
import org.testng.annotations.Test;

import com.alibaba.jtester.bo.IUserBo;
import com.alibaba.jtester.vo.Users;
/**
 * JTesterӦ��ʾ��ϵͳ1:<br/>
 * ���һ�������ݿ����CRUD�Ĺ���<br/>
 * ��Ҫ���ܣ�<br/>
 * <li>ʵ��Spring��ע��</li>
 * <li>ʵ�ֽ�����Mocked</li>
 */
@SpringApplicationContext({"applicationContext.xml"})
@AutoBeanInject
public class TestJdbc extends JTester{

	@SpringBeanByName
	private IUserBo userBo;
	
	//@SpringBeanByName("userBo")
	@Mocked
	private IUserBo userBo2;
	
	/**
	 * ͨ��Springע��userBo
	 */
	/**
	 * ͨ��Springע��userBo
	 */
	@Test
	public void testJdbc(){
		//��֤
		Users user = new Users();
		user.setUserId("1");
		user.setInviteUserId("1");
		user.setAlipayAccount("cenly60@163.com");
		want.string(userBo.addUser(user)).isEqualTo("success");
	}
	
	/**
	 * ͨ��Mocked
	 */
	@Test
	public void testAddUserByMocked(){
		
		//¼��
		new Expectations(){
			{
				Users user = new Users();
				userBo2.addUser(user);//������
				result = "mocked";//����ֵ
			}
		};
		//��֤
		Users user = new Users();
		want.string(userBo2.addUser(user)).isEqualTo("mocked");
	}
}
